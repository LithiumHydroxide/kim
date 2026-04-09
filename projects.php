<?php
/**
 * Projects/Portfolio Page - Kimathi Systems
 * Showcase of your actual GitHub and client projects
 */

$pageTitle = "Work";
include 'includes/config.php';
include 'includes/header.php';
?>

<main class="projects-page">

    <!-- Hero Section -->
    <section class="page-hero fade-in-section">
        <div class="container">
            <p class="page-subtitle">My Work</p>
            <h1 class="page-title">Real Projects, Real Impact</h1>
            <p class="page-description">
                Explore systems I've built for businesses, organizations, and communities&mdash;each designed to solve 
                specific challenges with clean code, thoughtful architecture, and measurable results.
            </p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="projects-filter fade-in-section">
        <div class="container">
            <div class="filter-controls">
                <button class="filter-btn active" data-filter="all">All Projects</button>
                <button class="filter-btn" data-filter="php">PHP/Laravel</button>
                <button class="filter-btn" data-filter="python">Python/AI</button>
                <button class="filter-btn" data-filter="payments">Payments</button>
                <button class="filter-btn" data-filter="education">Education</button>
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
                    $categories = ['all'];
                    $tagsLower = array_map('strtolower', $project['tags']);
                    
                    if(in_array('php', $tagsLower) || in_array('laravel', $tagsLower)) $categories[] = 'php';
                    if(in_array('python', $tagsLower) || in_array('ai', $tagsLower) || in_array('machine learning', $tagsLower)) $categories[] = 'python';
                    if(in_array('m-pesa', $tagsLower) || in_array('payment', $tagsLower) || in_array('payments', $tagsLower)) $categories[] = 'payments';
                    if(in_array('education', $tagsLower) || in_array('school', $tagsLower)) $categories[] = 'education';
                    
                    $dataCategory = implode(' ', array_unique($categories));
                    ?>
                    <article class="project-card-large" data-category="<?php echo htmlspecialchars($dataCategory); ?>">
                        <div class="project-image-container">
                            <!-- Placeholder image with fallback -->
                            <img src="<?php echo htmlspecialchars($project['image']); ?>" 
                                 alt="<?php echo htmlspecialchars($project['title']); ?>" 
                                 loading="lazy"
                                 width="800" height="500"
                                 onerror="this.src='assets/images/projects/placeholder.jpg'">
                            <div class="project-overlay">
                                <?php if($project['github']): ?>
                                    <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                        View on GitHub
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo htmlspecialchars($project['link']); ?>" class="btn btn-primary">
                                        View Case Study
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="project-info">
                            <div class="project-tags">
                                <?php foreach($project['tags'] as $tag): ?>
                                    <span class="tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                                <?php if($project['github']): ?>
                                    <span class="tag tag-github">🔗 Open Source</span>
                                <?php endif; ?>
                            </div>
                            <h3 class="project-title"><?php echo htmlspecialchars($project['title']); ?></h3>
                            <p class="project-description"><?php echo htmlspecialchars($project['description']); ?></p>
                            
                            <!-- Features List -->
                            <?php if(!empty($project['features'])): ?>
                                <details class="project-features">
                                    <summary>Key Features</summary>
                                    <ul>
                                        <?php foreach($project['features'] as $feature): ?>
                                            <li>✓ <?php echo htmlspecialchars($feature); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </details>
                            <?php endif; ?>
                            
                            <div class="project-impact-box">
                                <strong>Business Impact:</strong>
                                <p><?php echo htmlspecialchars($project['impact']); ?></p>
                            </div>
                            
                            <div class="project-actions">
                                <?php if($project['github']): ?>
                                    <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank" rel="noopener noreferrer" class="project-link">
                                        View Code <span class="arrow">&rarr;</span>
                                    </a>
                                <?php else: ?>
                                    <a href="<?php echo htmlspecialchars($project['link']); ?>" class="project-link">
                                        Learn More <span class="arrow">&rarr;</span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="projects-cta fade-in-section">
        <div class="container">
            <h2>Need a Similar Solution?</h2>
            <p>Whether you need a custom management system, payment integration, or AI-powered tool&mdash;I can build it with the same attention to quality and results.</p>
            <div class="cta-buttons">
                <a href="contact.php" class="btn btn-primary">Start Your Project</a>
                <a href="https://github.com/LithiumHydroxide" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                    View All Repositories
                </a>
            </div>
            <p class="cta-note">Free consultation • Clear scope • Dedicated support</p>
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
            
            // Filter projects with animation
            projectCards.forEach(card => {
                const categories = card.getAttribute('data-category');
                
                if(filter === 'all' || categories.includes(filter)) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
});
</script>