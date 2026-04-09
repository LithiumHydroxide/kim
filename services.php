<?php
/**
 * Services Page - Kimathi Rukunga
 * Detailed service offerings for potential clients
 */

$pageTitle = "Services";
include 'includes/config.php';
include 'includes/header.php';
?>

<main class="services-page">

    <!-- Hero Section -->
    <section class="page-hero fade-in-section">
        <div class="container">
            <p class="page-subtitle">What I Offer</p>
            <h1 class="page-title">Technology Solutions That Drive Business Growth</h1>
            <p class="page-description">
                From custom web development to AI-powered automation, I deliver end-to-end digital solutions 
                tailored to your organization's unique challenges and goals.
            </p>
        </div>
    </section>

    <!-- Services Overview Grid -->
    <section class="services-overview fade-in-section">
        <div class="container">
            <div class="services-grid">
                <?php foreach($services as $index => $service): ?>
                    <article class="service-card-large" id="<?php echo slugify($service['title']); ?>">
                        <div class="service-header">
                            <span class="service-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                            <div class="service-icon-large">
                                <?php echo $service['icon']; ?>
                            </div>
                        </div>
                        <h2 class="service-title"><?php echo htmlspecialchars($service['title']); ?></h2>
                        <p class="service-description"><?php echo htmlspecialchars($service['description']); ?></p>
                        
                        <div class="service-features">
                            <h4>What's Included:</h4>
                            <ul class="feature-list">
                                <?php 
                                $features = [
                                    'Custom Web Systems' => ['Custom Architecture Design', 'Database Optimization', 'API Integration', 'Security Implementation', 'Performance Optimization'],
                                    'Technical Consulting' => ['System Audit & Analysis', 'Technology Roadmap', 'Risk Assessment', 'Best Practices Guidance', 'Team Training'],
                                    'Business Process Automation' => ['Workflow Analysis', 'Automation Strategy', 'Tool Integration', 'Process Documentation', 'ROI Tracking'],
                                    'Data & AI Solutions' => ['Data Collection & Cleaning', 'Analytics Dashboard', 'Machine Learning Models', 'Predictive Insights', 'AI Tool Integration']
                                ];
                                $serviceFeatures = $features[$service['title']] ?? ['Custom Solutions', 'Expert Implementation', 'Ongoing Support'];
                                foreach($serviceFeatures as $feature): 
                                ?>
                                    <li>
                                        <svg class="check-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                        <?php echo htmlspecialchars($feature); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <a href="contact.php" class="btn btn-primary">Get Started</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="services-process fade-in-section">
        <div class="container">
            <h2 class="section-title">My Working Process</h2>
            <p class="section-intro">A proven methodology that ensures quality, transparency, and timely delivery.</p>
            
            <div class="process-steps">
                <?php foreach($config['process_steps'] as $index => $step): ?>
                    <div class="process-step">
                        <div class="step-icon">
                            <span class="step-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                        </div>
                        <div class="step-content">
                            <h3><?php echo htmlspecialchars($step['title']); ?></h3>
                            <p><?php echo htmlspecialchars($step['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Technologies Section -->
    <section class="services-tech fade-in-section">
        <div class="container">
            <h2 class="section-title">Technologies I Master</h2>
            <p class="section-intro">I use modern, reliable technologies to build scalable solutions.</p>
            
            <div class="tech-grid">
                <?php foreach($config['technologies'] as $tech): ?>
                    <div class="tech-card">
                        <span class="tech-name"><?php echo htmlspecialchars($tech); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="services-cta fade-in-section">
        <div class="container">
            <h2>Ready to Discuss Your Project?</h2>
            <p>Let's explore how my services can help solve your business challenges and drive measurable results.</p>
            <a href="contact.php" class="btn btn-primary btn-large">Schedule a Consultation</a>
            <p class="cta-note">Free 15-minute consultation • No obligation</p>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>