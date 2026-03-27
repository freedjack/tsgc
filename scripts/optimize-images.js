#!/usr/bin/env node

const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');

// Configuration
const CONFIG = {
    jpegQuality: 80,
    webpQuality: 80,
    avifQuality: 70,

    // Output sizes in pixels (width)
    largeWidth: 2000,
    thumbWidth: 800,

    // Source is original-images, output is optimized
    sourceDir: './assets/images/original-images',
    optimizedDir: './assets/images/optimized',

    imageExtensions: ['.jpg', '.jpeg', '.png'],

    skipPatterns: ['logo', 'tsgc_logo', 'xx-tsgc_logo']
};

class ImageOptimizer {
    constructor() {
        this.stats = {
            processed: 0,
            skipped: 0,
            errors: 0,
            originalSize: 0,
            optimizedSize: 0
        };
    }

    // Check if ImageMagick is available
    checkDependencies() {
        try {
            execSync('magick -version', { stdio: 'ignore' });
            console.log('✅ ImageMagick found');
            return true;
        } catch (error) {
            console.log('❌ ImageMagick not found. Installing...');
            try {
                execSync('brew install imagemagick', { stdio: 'inherit' });
                console.log('✅ ImageMagick installed');
                return true;
            } catch (installError) {
                console.error('❌ Failed to install ImageMagick. Please install manually:');
                console.error('   brew install imagemagick');
                return false;
            }
        }
    }

    setupDirectories() {
        const dirs = [
            path.join(CONFIG.optimizedDir, 'large', 'jpg'),
            path.join(CONFIG.optimizedDir, 'large', 'webp'),
            path.join(CONFIG.optimizedDir, 'large', 'avif'),
            path.join(CONFIG.optimizedDir, 'thumb', 'jpg'),
            path.join(CONFIG.optimizedDir, 'thumb', 'webp'),
            path.join(CONFIG.optimizedDir, 'thumb', 'avif'),
        ];

        dirs.forEach(dir => {
            if (!fs.existsSync(dir)) {
                fs.mkdirSync(dir, { recursive: true });
                console.log(`📁 Created: ${dir}`);
            }
        });
    }

    // Check if file should be skipped
    shouldSkip(filename) {
        return CONFIG.skipPatterns.some(pattern => 
            filename.toLowerCase().includes(pattern.toLowerCase())
        );
    }

    // Get file size in bytes
    getFileSize(filePath) {
        return fs.statSync(filePath).size;
    }

    // Format file size for display
    formatFileSize(bytes) {
        const sizes = ['B', 'KB', 'MB', 'GB'];
        if (bytes === 0) return '0 B';
        const i = Math.floor(Math.log(bytes) / Math.log(1024));
        return Math.round(bytes / Math.pow(1024, i) * 100) / 100 + ' ' + sizes[i];
    }

    // Optimize single image
    async optimizeImage(inputPath, outputDir, format, quality, width = null) {
        const filename = path.basename(inputPath, path.extname(inputPath));
        const outputPath = path.join(outputDir, `${filename}.${format}`);
        
        let command = `magick "${inputPath}"`;
        
        if (width) {
            command += ` -resize "${width}x>"`;
        }
        
        // Add format-specific optimization
        switch (format) {
            case 'jpg':
                command += ` -quality ${quality} -strip -interlace Plane`;
                break;
            case 'webp':
                command += ` -quality ${quality}`;
                break;
            case 'avif':
                command += ` -quality ${quality}`;
                break;
        }
        
        command += ` "${outputPath}"`;
        
        try {
            execSync(command, { stdio: 'ignore' });
            return outputPath;
        } catch (error) {
            console.error(`❌ Failed to optimize ${inputPath} to ${format}:`, error.message);
            return null;
        }
    }

    // Generate all three formats (jpg, webp, avif) at a given width into a target dir
    async generateVariant(inputPath, variantName, width) {
        const formats = [
            { ext: 'jpg',  quality: CONFIG.jpegQuality },
            { ext: 'webp', quality: CONFIG.webpQuality },
            { ext: 'avif', quality: CONFIG.avifQuality },
        ];

        let totalSize = 0;
        for (const fmt of formats) {
            const outDir = path.join(CONFIG.optimizedDir, variantName, fmt.ext);
            const result = await this.optimizeImage(inputPath, outDir, fmt.ext, fmt.quality, width);
            if (result) {
                const size = this.getFileSize(result);
                totalSize += size;
                console.log(`   ${variantName}/${fmt.ext}: ${this.formatFileSize(size)}`);
            }
        }
        return totalSize;
    }

    async processImage(filePath) {
        const filename = path.basename(filePath);

        if (this.shouldSkip(filename)) {
            console.log(`⏭️  Skipping: ${filename}`);
            this.stats.skipped++;
            return;
        }

        console.log(`\n🖼️  Processing: ${filename}`);

        const originalSize = this.getFileSize(filePath);
        this.stats.originalSize += originalSize;
        console.log(`   Original: ${this.formatFileSize(originalSize)}`);

        let optimizedSize = 0;

        // Large variant (2000px wide)
        optimizedSize += await this.generateVariant(filePath, 'large', CONFIG.largeWidth);

        // Thumb variant (800px wide)
        optimizedSize += await this.generateVariant(filePath, 'thumb', CONFIG.thumbWidth);

        this.stats.optimizedSize += optimizedSize;
        this.stats.processed++;

        const savings = originalSize - optimizedSize;
        const pct = ((savings / originalSize) * 100).toFixed(1);
        console.log(`   Total optimized: ${this.formatFileSize(optimizedSize)} (${pct}% savings)`);
    }

    // Find image files in the original-images source directory (non-recursive, top-level only)
    findImageFiles(dir) {
        if (!fs.existsSync(dir)) {
            console.error(`❌ Source directory not found: ${dir}`);
            return [];
        }
        return fs.readdirSync(dir)
            .filter(f => {
                const ext = path.extname(f).toLowerCase();
                return CONFIG.imageExtensions.includes(ext) && fs.statSync(path.join(dir, f)).isFile();
            })
            .map(f => path.join(dir, f));
    }

    // Main optimization process
    async optimize() {
        console.log('🚀 Starting image optimization...\n');
        
        // Check dependencies
        if (!this.checkDependencies()) {
            process.exit(1);
        }
        
        // Setup directories
        this.setupDirectories();
        
        // Find all images
        const imageFiles = this.findImageFiles(CONFIG.sourceDir);
        console.log(`📊 Found ${imageFiles.length} images to process\n`);
        
        // Process each image
        for (const filePath of imageFiles) {
            try {
                await this.processImage(filePath);
            } catch (error) {
                console.error(`❌ Error processing ${filePath}:`, error.message);
                this.stats.errors++;
            }
        }
        
        // Print summary
        this.printSummary();
    }

    // Print optimization summary
    printSummary() {
        console.log('\n' + '='.repeat(50));
        console.log('📊 OPTIMIZATION SUMMARY');
        console.log('='.repeat(50));
        console.log(`✅ Processed: ${this.stats.processed} images`);
        console.log(`⏭️  Skipped: ${this.stats.skipped} images (logos)`);
        console.log(`❌ Errors: ${this.stats.errors} images`);
        console.log(`📦 Original size: ${this.formatFileSize(this.stats.originalSize)}`);
        console.log(`📦 Optimized size: ${this.formatFileSize(this.stats.optimizedSize)}`);
        
        const totalSavings = this.stats.originalSize - this.stats.optimizedSize;
        const savingsPercent = ((totalSavings / this.stats.originalSize) * 100).toFixed(1);
        
        console.log(`💰 Total savings: ${this.formatFileSize(totalSavings)} (${savingsPercent}%)`);
        console.log('\n🎉 Optimization complete!');
        console.log('\n📁 Directory structure:');
        console.log('   assets/images/original-images/  - Source originals');
        console.log('   assets/images/optimized/');
        console.log('     ├── large/{jpg,webp,avif}/   - ' + CONFIG.largeWidth + 'px wide');
        console.log('     └── thumb/{jpg,webp,avif}/   - ' + CONFIG.thumbWidth + 'px wide');
    }
}

// Run optimization
if (require.main === module) {
    const optimizer = new ImageOptimizer();
    optimizer.optimize().catch(console.error);
}

module.exports = ImageOptimizer;
