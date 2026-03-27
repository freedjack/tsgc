# BrowserSync Setup for TSGC Website

BrowserSync has been configured to automatically refresh your browser when you make changes to files.

## Prerequisites

Make sure your local PHP server is running at `https://tsgc.test` (using Laravel Valet, XAMPP, or similar).

## How to Use

1. **Start BrowserSync:**
   ```bash
   npm run dev
   ```
   or
   ```bash
   npm start
   ```

2. **What it does:**
   - Proxies your existing `https://tsgc.test` site to `http://localhost:3000`
   - Opens your browser automatically to the proxied version
   - Watches for changes in PHP, HTML, CSS, JS, and image files
   - Automatically refreshes the browser when files are modified
   - Provides a UI at `http://localhost:3001` for additional controls

## File Watching

BrowserSync will automatically refresh when you change:
- PHP files (`.php`)
- HTML files (`.html`)
- CSS files (`.css`)
- JavaScript files (`.js`)
- Image files (`.png`, `.jpg`, `.jpeg`, `.gif`, `.svg`)

## Configuration

The BrowserSync configuration is in `bs-config.js`. You can modify:
- Port numbers (default: 3000 for site, 3001 for UI)
- File patterns to watch
- Server settings
- Middleware options

## Troubleshooting

- **File downloads instead of web pages**: Make sure your local PHP server is running at `https://tsgc.test`
- **Connection refused**: Verify that `https://tsgc.test` is accessible in your browser before starting BrowserSync
- If port 3000 is in use, BrowserSync will automatically try the next available port
- Make sure you have Node.js installed
- If your local site uses a different URL, update the `proxy` setting in `bs-config.js`

## Stopping BrowserSync

Press `Ctrl+C` in the terminal to stop BrowserSync.
