module.exports = {
    // Proxy to your existing local PHP server
    proxy: "https://tsgc.test",
    
    // Watch for file changes
    files: [
        "**/*.php",
        "**/*.html", 
        "**/*.css",
        "**/*.js",
        "**/*.png",
        "**/*.jpg",
        "**/*.jpeg",
        "**/*.gif",
        "**/*.svg"
    ],
    
    // BrowserSync options
    port: 3000,
    open: true,
    notify: false,
    reloadOnRestart: true,
    
    // HTTPS settings for proxy
    https: false, // BrowserSync will use HTTP but proxy to your HTTPS site
    
    // Log level
    logLevel: "info",
    
    // UI settings
    ui: {
        port: 3001
    },
    
    // Additional proxy options
    serveStatic: [{
        route: '/assets',
        dir: './assets'
    }]
};
