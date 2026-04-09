<?php
/**
 * Homepage - Kimathi Rukunga
 * Scalable Digital Solutions for Modern Businesses
 */

// Set page title for dynamic header
$pageTitle = "Home";

// Include configuration (services, projects, site settings)
include 'includes/config.php';
include 'includes/header.php';
?>

<main class="homepage">

    <!-- 1. HERO SECTION -->
    <section class="hero fade-in-section">
        <div class="hero-content">
            <p class="positioning-statement">
                Helping businesses build efficient digital systems through custom development, automation, and data-driven solutions.
            </p>
            <h1 class="hero-headline">Scalable Digital Systems for Modern Businesses</h1>
            <p class="hero-subheadline">
                I design and develop secure web platforms, automation tools, and data-driven systems that help businesses streamline operations, improve efficiency, and scale with confidence.
            </p>
            <div class="cta-group">
                <a href="projects.php" class="btn btn-primary">View Case Studies</a>
                <a href="services.php" class="btn btn-secondary">My Services</a>
            </div>
        </div>
        <div class="hero-background">
            <div class="gradient-mesh"></div>
        </div>
    </section>

    <!-- 2. TRUST BAR - Technologies -->
    <section class="trust-bar fade-in-section">
        <div class="container">
            <p class="trust-heading">Technologies I Use to Build Reliable Systems</p>
            <div class="tech-marquee">
                <div class="tech-track">
                    <?php foreach($config['technologies'] as $tech): ?>
                        <span class="tech-item"><?php echo htmlspecialchars($tech); ?></span>
                    <?php endforeach; ?>
                    <!-- Duplicate for seamless scroll -->
                    <?php foreach($config['technologies'] as $tech): ?>
                        <span class="tech-item"><?php echo htmlspecialchars($tech); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CORE SERVICES (PHP Loop from config.php) -->
    <section class="services fade-in-section">
        <div class="container">
            <h2 class="section-title">Core Services</h2>
            <p class="section-intro">Strategic technology solutions designed to solve business challenges and drive measurable outcomes.</p>
            
            <div class="services-grid">
                <?php foreach($services as $service): ?>
                    <article class="service-card">
                        <div class="service-icon">
                            <span class="icon-placeholder"><?php echo $service['icon']; ?></span>
                        </div>
                        <h3><?php echo htmlspecialchars($service['title']); ?></h3>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                        <a href="services.php#<?php echo slugify($service['title']); ?>" class="service-link">
                            Learn more <span class="arrow">&rarr;</span>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. MINI ABOUT SECTION -->
    <section class="about-mini fade-in-section">
        <div class="container about-grid">
            <div class="about-content">
                <h2>Behind the Systems</h2>
                <p>I'm <strong>Kimathi Rukunga</strong>, a technical consultant and developer focused on building digital infrastructure that solves real business problems. With 5+ years of experience, I partner with organizations to turn complex challenges into efficient, scalable solutions.</p>
                <p>My approach blends technical expertise with business strategy&mdash;ensuring every system I build delivers tangible value, not just clean code.</p>
                <a href="about.php" class="text-link">More about my approach <span class="arrow">&rarr;</span></a>
            </div>
            <div class="about-visual">
                <img src="assets/images/kim.jpg" alt="Kimathi Rukunga" class="about-image">
            </div>
        </div>
    </section>

    <!-- 5. FEATURED CASE STUDIES -->
    <section class="case-studies fade-in-section">
        <div class="container">
            <h2 class="section-title">Selected Case Studies</h2>
            <p class="section-intro">Real-world solutions delivering measurable business impact.</p>
            
            <div class="projects-grid">
                <?php foreach($projects as $project): ?>
                    <article class="project-card">
                        <div class="project-image">
                            <img src="<?php echo htmlspecialchars($project['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($project['title']); ?>" 
                                 loading="lazy"
                                 width="600" height="400">
                            <div class="project-overlay">
                                <a href="<?php echo htmlspecialchars($project['link']); ?>" class="btn btn-sm">View Study</a>
                            </div>
                        </div>
                        <div class="project-content">
                            <div class="project-tags">
                                <?php foreach($project['tags'] as $tag): ?>
                                    <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="project-desc"><?php echo htmlspecialchars($project['description']); ?></p>
                            <p class="project-impact">
                                <strong>Business Impact:</strong> <?php echo htmlspecialchars($project['impact']); ?>
                            </p>
                            <a href="<?php echo htmlspecialchars($project['link']); ?>" class="project-link">
                                Read full case study <span class="arrow">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            
            <div class="projects-cta">
                <a href="projects.php" class="btn btn-outline">View All Projects</a>
            </div>
        </div>
    </section>

    <!-- 6. THE PROCESS (Timeline) -->
    <section id="process" class="process fade-in-section">
        <div class="container">
            <h2 class="section-title">My Process</h2>
            <p class="section-intro">A structured, independent approach to delivering reliable digital solutions.</p>
            
            <div class="timeline">
                <?php foreach($config['process_steps'] as $index => $step): ?>
                    <div class="timeline-item">
                        <span class="step-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                        <div class="timeline-content">
                            <h3><?php echo htmlspecialchars($step['title']); ?></h3>
                            <p><?php echo htmlspecialchars($step['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 7. KEY METRICS -->
    <section class="metrics fade-in-section">
        <div class="container metrics-grid">
            <?php foreach($config['metrics'] as $metric): ?>
                <div class="metric-card">
                    <div class="metric-value">
                        <span class="count" data-target="<?php echo (int)$metric['number']; ?>">0</span>
                        <?php if(!empty($metric['suffix'])): ?>
                            <span class="suffix"><?php echo htmlspecialchars($metric['suffix']); ?></span>
                        <?php endif; ?>
                    </div>
                    <p class="metric-label"><?php echo htmlspecialchars($metric['label']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 8. TESTIMONIALS -->
    <?php
    $testimonials = $config['testimonials'] ?? [];
    if (empty($testimonials) && !empty($config['testimonial'])) {
        $testimonials = [$config['testimonial']];
    }
    ?>
    <?php if(!empty($testimonials)): ?>
    <section class="testimonial fade-in-section">
        <div class="container">
            <div class="testimonial-slider" data-testimonial-slider aria-live="polite">
                <button class="testimonial-nav testimonial-nav--prev" aria-label="Previous testimonial" data-testimonial-prev>
                    <span aria-hidden="true">←</span>
                </button>
                <div class="testimonial-track">
                    <?php foreach($testimonials as $index => $testimonial): ?>
                    <article class="testimonial-card<?php echo $index === 0 ? ' is-active' : ''; ?>">
                        <blockquote class="testimonial-quote">
                            "<?php echo htmlspecialchars($testimonial['text']); ?>"
                        </blockquote>
                        <cite class="testimonial-author">
                            &mdash; <?php echo htmlspecialchars($testimonial['name']); ?>
                            <span class="author-title"><?php echo htmlspecialchars($testimonial['title']); ?></span>
                        </cite>
                    </article>
                    <?php endforeach; ?>
                </div>
                <button class="testimonial-nav testimonial-nav--next" aria-label="Next testimonial" data-testimonial-next>
                    <span aria-hidden="true">→</span>
                </button>
                <div class="testimonial-dots" data-testimonial-dots aria-label="Testimonial navigation">
                    <?php foreach($testimonials as $index => $testimonial): ?>
                    <button class="testimonial-dot<?php echo $index === 0 ? ' is-active' : ''; ?>" 
                            aria-label="Go to testimonial <?php echo $index + 1; ?>" 
                            data-testimonial-dot="<?php echo $index; ?>"></button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- 9. FINAL CTA -->
    <section class="final-cta fade-in-section">
        <div class="container">
            <h2>Ready to Transform Your Digital Operations?</h2>
            <p>Let's discuss how I can help streamline your workflows, automate processes, and build scalable systems for your organization.</p>
            <a href="contact.php" class="btn btn-primary btn-large">Start Your Project</a>
            <p class="cta-note">Free 15-minute consultation • No obligation</p>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>
