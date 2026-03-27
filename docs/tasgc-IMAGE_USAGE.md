# Image Usage Documentation

This document lists all images used in the site and their specific purposes.

## Hero Images

### Homepage (`index.php`)
- **Image**: `assets/images/thumb/insta crowd.jpg`
- **Purpose**: Main hero background (matches original Vue.js site)

### Training Page (`training.php`)
- **Image**: `assets/images/large/room-with-tables.jpg`
- **Purpose**: Hero background for training programs overview

### Contact Page (`contact.php`)
- **Image**: `assets/images/large/andrey-metelev-games.jpg`
- **Purpose**: Hero background for contact page

### Individual Training Pages
Each training program page uses its specific image from `config.php`:
- **The Hack**: `assets/images/large/clint-patterson-hacker.jpg`
- **Live in the Morning**: `assets/images/large/sam-mcghee-studio.jpg`
- **Covert Operations Academy**: `assets/images/large/spy-lld.jpg`
- **The Situation Room**: `assets/images/large/room-with-tables.jpg`

## Content Images

### Homepage Content
- `assets/images/large/SGmeditationLIVE AND LET DINE JUNE 2024_The Celtic Manor_PB-30.jpg` - People meditating
- `assets/images/large/LaughLIVE AND LET DINE JUNE 2024_The Celtic Manor_PB-25.jpg` - People laughing
- `assets/images/large/SCIENTISTS.jpg` - Scientists walking
- `assets/images/thumb/OwenLIVE AND LET DINE.jpg` - Man with microphone

### Training Page Content
- `assets/images/large/SCIENTISTS.jpg` - Scientists collaborating

### Training Program Thumbnails
- `assets/images/thumb/clint-patterson-hacker.jpg` - The Hack
- `assets/images/thumb/sam-mcghee-studio.jpg` - Live in the Morning
- `assets/images/thumb/spy-lld.jpg` - Covert Operations Academy
- `assets/images/thumb/room-with-tables.jpg` - The Situation Room

## Branding & Meta Images

### Logo
- `assets/images/tsgc_logo.png` - Company logo (header)

### Social Media & Meta
- `assets/images/large/OnPodium.jpg` - Open Graph and Twitter Card images

## Image Organization

### Large Images (`assets/images/large/`)
High-resolution images for hero sections and content areas:
- `andrey-metelev-games.jpg`
- `clint-patterson-hacker.jpg`
- `LaughLIVE AND LET DINE JUNE 2024_The Celtic Manor_PB-25.jpg`
- `OnPodium.jpg`
- `room-with-tables.jpg`
- `sam-mcghee-studio.jpg`
- `SCIENTISTS.jpg`
- `SGmeditationLIVE AND LET DINE JUNE 2024_The Celtic Manor_PB-30.jpg`
- `spy-lld.jpg`

### Thumbnail Images (`assets/images/thumb/`)
Smaller images for cards and previews:
- `clint-patterson-hacker.jpg`
- `insta crowd.jpg`
- `OwenLIVE AND LET DINE.jpg`
- `room-with-tables.jpg`
- `sam-mcghee-studio.jpg`
- `spy-lld.jpg`

### Root Images (`assets/images/`)
General images:
- `room-with-tables.jpg` - Alternative hero background
- `tsgc_logo.png` - Company logo

## Image Optimization

All images are optimized for web use:
- **Hero images**: High quality for visual impact
- **Thumbnails**: Compressed for fast loading
- **Content images**: Balanced quality and file size
- **Logo**: PNG format for transparency support

## Adding New Images

1. **Hero Images**: Place in `assets/images/large/`
2. **Thumbnails**: Place in `assets/images/thumb/`
3. **Logos**: Place in `assets/images/`
4. **Update paths**: Modify `config.php` for training programs
5. **Update hardcoded paths**: Check PHP files for direct references
