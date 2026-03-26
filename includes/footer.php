<?php
/**
 * Footer Partial - Kimathi Rukunga
 */

// Ensure config is available
if (!isset($config)) {
    include __DIR__ . '/config.php';
}
?>
    </main> <!-- End #main-content -->
    
    <!-- Footer Section -->
    <footer class="footer" role="contentinfo">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="index.php" class="logo footer-logo">
                        <span class="logo-text">KIMATHI <span class="logo-divider">//</span> SYSTEMS</span>
                    </a>
                    <p class="footer-tagline">Building efficient digital systems through custom development, automation, and data-driven solutions.</p>
                </div>
                
                <div class="footer-links">
                    <div class="footer-col">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="projects.php">Work</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    
                    <div class="footer-col">
                        <h4>Contact</h4>
                        <ul>
                            <li><a href="mailto:kimathirukunga001@email.com">kimathirukunga001@email.com</a></li>
                            <li><a href="https://www.linkedin.com/in/kimathi-rukunga-64b0312a1/" target="_blank">LinkedIn</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Kimathi Rukunga. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- JavaScript File -->
    <script src="assets/js/main.js" defer></script>
</body>
</html>