<?php
/**
 * Projects/Portfolio Page - Kimathi Rukunga
 * Showcase of completed work and case studies
 */

$pageTitle = "Work";
include 'includes/config.php';
include 'includes/header.php';
?>

<main class="projects-page">

    <!-- Hero Section -->
    <section class="page-hero fade-in-section">
        <div class="container">
            <p class="page-subtitle">Our Work</p>
            <h1 class="page-title">Case Studies & Success Stories</h1>
            <p class="page-description">
                Explore how we've helped businesses transform their operations through strategic technology 
                solutions, custom development, and data-driven innovation.
            </p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="projects-filter fade-in-section">
        <div class="container">
            <div class="filter-controls">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <button class="filter-btn" data-filter="automation">Automation</button>
                <button class="filter-btn" data-filter="web">Web Applications</button>
                <button class="filter-btn" data-filter="ai">AI & Data</button>
            </div>
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="projects-grid-section fade-in-section">
        <div class="container">
            <div class="projects-grid" id="projects-container">
                <?php foreach($projects as $project): ?>
                    <?php 
                    // Determine category for filtering
                    $categories = [];
                    foreach($project['tags'] as $tag) {
                        $tagLower = strtolower($tag);
                        if(strpos($tagLower, 'automation') !== false) $categories[] = 'automation';
                        if(strpos($tagLower, 'web') !== false || strpos($tagLower, 'application') !== false) $categories[] = 'web';
                        if(strpos($tagLower, 'ai') !== false || strpos($tagLower, 'intelligence') !== false) $categories[] = 'ai';
                    }
                    $categories = array_unique($categories);
                    $dataCategory = !empty($categories) ? implode(' ', $categories) : 'all';
                    ?>
                    <article class="project-card-large" data-category="<?php echo htmlspecialchars($dataCategory); ?>">
                        <div class="project-image-container">
                            <img src="<?php echo htmlspecialchars($project['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($project['title']); ?>" 
                                 loading="lazy"
                                 width="800" height="500">
                            <div class="project-overlay">
                                <a href="<?php echo htmlspecialchars($project['link']); ?>" class="btn btn-primary">View Case Study</a>
                            </div>
                        </div>
                        <div class="project-info">
                            <div class="project-tags">
                                <?php foreach($project['tags'] as $tag): ?>
                                    <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="project-description"><?php echo htmlspecialchars($project['description']); ?></p>
                            <div class="project-impact-box">
                                <strong>Business Impact:</strong>
                                <p><?php echo htmlspecialchars($project['impact']); ?></p>
                            </div>
                            <a href="<?php echo htmlspecialchars($project['link']); ?>" class="project-link">
                                Read Full Case Study <span class="arrow">→</span>
                            </a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Services Teaser -->
    <section class="projects-services-teaser fade-in-section">
        <div class="container">
            <h2 class="section-title">Need a Similar Solution?</h2>
            <p class="section-intro">We can build custom systems tailored to your specific business needs and industry requirements.</p>
            
            <div class="services-preview-grid">
                <?php foreach(array_slice($services, 0, 3) as $service): ?>
                    <div class="service-preview-card">
                        <div class="service-icon-preview">
                            <?php echo htmlspecialchars($service['icon']); ?>
                        </div>
                        <h4><?php echo htmlspecialchars($service['title']); ?></h4>
                        <p><?php echo htmlspecialchars($service['description']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="services-preview-cta">
                <a href="services.php" class="btn btn-outline">View All Services</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="projects-cta fade-in-section">
        <div class="container">
            <h2>Ready to Start Your Project?</h2>
            <p>Let's discuss how we can help you build scalable, efficient digital solutions that drive real business value.</p>
            <a href="contact.php" class="btn btn-primary btn-large">Start Your Project</a>
            <p class="cta-note">Free consultation • Clear pricing • Dedicated support</p>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>

<!-- Project Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card-large');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            const filter = btn.getAttribute('data-filter');
            
            // Filter projects
            projectCards.forEach(card => {
                const categories = card.getAttribute('data-category');
                
                if(filter === 'all' || categories.includes(filter)) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.5s ease forwards';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>