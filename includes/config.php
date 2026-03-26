<?php
// includes/config.php - Central Content Management

// Site Configuration
$config = [
    'site_name' => 'Kimathi // Systems',
    'email' => 'kimathirukunga001@email.com',
    'linkedin' => 'https://www.linkedin.com/in/kimathi-rukunga-64b0312a1/',
    
    // Technologies for Trust Bar
    'technologies' => [
        'PHP', 'Laravel', 'JavaScript', 'Vue.js', 
        'Python', 'MySQL', 'AWS', 'Docker', 'Git'
    ],
    
    // Process Steps
    'process_steps' => [
        [
            'title' => 'Discovery',
            'description' => 'Understanding the client\'s challenges, goals, and operational needs.'
        ],
        [
            'title' => 'Strategy',
            'description' => 'Designing the system architecture and roadmap that aligns technology with business objectives.'
        ],
        [
            'title' => 'Development',
            'description' => 'Building secure, scalable, and efficient digital solutions using modern technologies.'
        ],
        [
            'title' => 'Launch & Support',
            'description' => 'Deploying the solution and providing ongoing improvements and technical support.'
        ]
    ],
    
    // Key Metrics
    'metrics' => [
        ['number' => 5, 'suffix' => '+', 'label' => 'Years Technical Experience'],
        ['number' => 12, 'suffix' => '+', 'label' => 'Production Systems Built'],
        ['number' => 100, 'suffix' => '%', 'label' => 'Client Satisfaction'],
        ['number' => 24, 'suffix' => 'h', 'label' => 'Average Response Time']
    ],
    
    // Optional Testimonial
    'testimonial' => [
        'text' => 'Kimathi delivered a custom automation system that cut our monthly reporting time by 70%. Professional, strategic, and technically excellent.',
        'name' => 'Jane Doe',
        'title' => 'Operations Director, TechStart Ltd'
    ]
];

// Services Array (Used in Services Grid)
$services = [
    [
        'title' => 'Custom Web Systems',
        'description' => 'Tailored platforms designed to automate workflows, manage operations, and improve efficiency for businesses and organizations.',
        'icon' => '💻',
        'slug' => 'custom-web'
    ],
    [
        'title' => 'Technical Consulting',
        'description' => 'Architecture planning, system audits, and strategic guidance to help businesses adopt the right technology solutions.',
        'icon' => '🎯',
        'slug' => 'consulting'
    ],
    [
        'title' => 'Business Process Automation',
        'description' => 'Transform manual processes into automated digital workflows that save time, reduce errors, and improve productivity.',
        'icon' => '⚡',
        'slug' => 'automation'
    ],
    [
        'title' => 'Data & AI Solutions',
        'description' => 'Data analysis, intelligent tools, and AI-driven systems that help organizations make better decisions using their data.',
        'icon' => '🤖',
        'slug' => 'ai-solutions'
    ]
];

// Featured Projects Array (Used in Case Studies)
$projects = [
    [
        'title' => 'Smart Rent & Debt Enforcement Platform',
        'tags' => ['Property Management', 'Automation', 'Payments'],
        'description' => 'Built a digital platform that helps landlords track rent payments, monitor arrears, and automate tenant management.',
        'impact' => 'Improves financial transparency and reduces manual tracking of tenant payments.',
        'image' => 'assets/images/projects/rent-platform.jpg',
        'link' => 'project-detail.php?id=rent-platform'
    ],
    [
        'title' => 'E-commerce Platform',
        'tags' => ['Inventory', 'Web Application', 'Vue & Laravel'],
        'description' => 'Developed a smart wardrobe management platform allowing users to organize clothing inventory and manage outfits efficiently.',
        'impact' => 'Demonstrates scalable architecture for inventory-based systems.',
        'image' => 'assets/images/projects/ecommerce-platform.jpg',
        'link' => 'project-detail.php?id=ecommerce'
    ],
    [
        'title' => 'Leaf Disease Detection System',
        'tags' => ['Artificial Intelligence', 'Computer Vision'],
        'description' => 'Built an AI-powered tool that detects plant diseases using image analysis to assist farmers in identifying crop issues early.',
        'impact' => 'Improves agricultural productivity through early disease detection.',
        'image' => 'assets/images/projects/ai-agriculture.jpg',
        'link' => 'project-detail.php?id=leaf-detection'
    ]
];

// Helper function to create URL-friendly slugs
function slugify($text) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
}
?>