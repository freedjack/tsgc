    </main>
    
    <!-- Footer -->
    <footer class="site-footer" role="contentinfo">
        <div class="footer-content">
            <div class="footer-section">
                <h3><?php echo SITE_NAME; ?></h3>
                <p>Using role play, simulations and games to unlock your team's potential.</p>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/training">Training</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/faq">FAQ</a></li>
                    <li><a href="/knowledge">Insights & Knowledge</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Training Programs</h3>
                <ul>
                    <li><a href="the-hack">The Hack</a></li>
                    <li><a href="covert-operations-training-academy">Covert Ops Academy</a></li>
                    <li><a href="live-in-the-morning">Live in the Morning</a></li>
                    <li><a href="the-situation-room">The Situation Room</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Ready to transform your team's training?</p>
                <a href="/contact" class="footer-cta">Get in Touch</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
            <p><a href="/sitemap.xml" rel="sitemap" style="color: inherit; opacity: 0.8;">Sitemap</a></p>
        </div>
    </footer>
    
    <!-- JavaScript -->
    <script src="/assets/js/main.js" defer></script>
    
    <!-- Analytics (also in header, but footer ensures it loads) -->
        <?php // include __DIR__ . '/analytics.php'; ?>
</body>
</html>
