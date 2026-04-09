<?php
// includes/config.php - Updated with YOUR real projects

$config = [
    'site_name' => 'Kimathi // Rukunga',
    'email' => 'kimathirukunga001@gmail.com',
    'linkedin' => 'https://linkedin.com/in/kimathi-rukunga-294b72308',
    
    'technologies' => [
        'PHP', 'Laravel', 'Python', 'JavaScript', 'Vue.js', 
        'MySQL', 'PostgreSQL', 'M-Pesa API', 'Git', 'Linux'
    ],
    
    'process_steps' => [
        ['title' => 'Discovery', 'description' => 'Understanding your challenges, goals, and operational requirements through detailed consultation.'],
        ['title' => 'Strategy', 'description' => 'Designing system architecture and a technology roadmap aligned with your business objectives.'],
        ['title' => 'Development', 'description' => 'Building secure, scalable solutions using modern frameworks and best practices.'],
        ['title' => 'Launch & Support', 'description' => 'Deploying your solution with documentation, training, and ongoing technical support.']
    ],
    
    'metrics' => [
        ['number' => 5, 'suffix' => '+', 'label' => 'Years Technical Experience'],
        ['number' => 8, 'suffix' => '+', 'label' => 'Production Systems Deployed'],
        ['number' => 100, 'suffix' => '%', 'label' => 'Client Satisfaction'],
        ['number' => 24, 'suffix' => 'h', 'label' => 'Average Response Time']
    ],
    
    'testimonials' => [
        [
            'text' => 'The Threeft platform stands out for its clean, intuitive interface. Navigating through products feels seamless, and the layout makes it easy for users to find exactly what they need without friction.',
            'name' => 'Happyton Mbaka',
            'title' => 'CEO, Threeft Pay'
        ],
        [
            'text' => 'Kimathi delivered a salon management system that streamlined our bookings and reporting. Professional, responsive, and technically excellent.',
            'name' => 'Karembo Salon Owner',
            'title' => 'Nairobi, Kenya'
        ]
    ],
    'testimonial' => [
        'text' => 'Kimathi delivered a salon management system that streamlined our bookings and reporting. Professional, responsive, and technically excellent.',
        'name' => 'Karembo Salon Owner',
        'title' => 'Nairobi, Kenya'
    ]
];

// Services Array
$services = [
    [
        'title' => 'Custom Web Systems',
        'description' => 'Tailored platforms built with PHP/Laravel to automate workflows, manage operations, and improve organizational efficiency.',
            'icon' => '&#x1F4BB;',
            'slug' => 'custom-web'
        ],
        [
            'title' => 'Technical Consulting',
            'description' => 'System architecture planning, security audits, and strategic guidance to help you adopt the right technology solutions.',
            'icon' => '&#x1F3AF;',
            'slug' => 'consulting'
        ],
        [
            'title' => 'Business Process Automation',
            'description' => 'Transform manual processes into automated digital workflows&mdash;booking systems, payment integration, reporting dashboards.',
            'icon' => '&#x26A1;',
            'slug' => 'automation'
        ],
        [
            'title' => 'AI & Data Solutions',
            'description' => 'Python-powered analytics, predictive models, and AI tools that help organizations make data-driven decisions.',
            'icon' => '&#x1F916;',
// ===== YOUR REAL PROJECTS (From GitHub + Collaborations) =====
$projects = [
    [
        'title' => 'Salon Management',
        'tags' => ['PHP', 'MySQL', 'Booking System', 'Reports'],
        'description' => 'A comprehensive management platform where clients can book sessions, staff can manage schedules, and administrators can track transactions and generate business reports.',
        'impact' => 'Reduced manual booking errors by 90% and provided real-time revenue insights for better business decisions.',
        'image' => 'assets/images/karembo.png',
        'link' => 'https://github.com/LithiumHydroxide/Salon-management-system',
        'github' => true,
        'features' => ['User Authentication', 'Appointment Booking', 'Payment Tracking', 'Report Generation', 'Admin Dashboard']
    ],
    [
        'title' => 'Child Development',
        'tags' => ['Python', 'Machine Learning', 'Healthcare', 'AI'],
        'description' => 'An AI-powered tool that analyzes developmental indicators to detect early signs of mental health conditions in children, supporting early intervention.',
        'impact' => 'Provides healthcare workers with a data-driven screening tool to identify at-risk children sooner.',
        'image' => 'assets/images/child.png',
        'link' => 'https://github.com/LithiumHydroxide/Early-Childhood-Development-predictor',
        'github' => true,
        'features' => ['Predictive Modeling', 'Risk Assessment', 'Data Visualization', 'Exportable Reports', 'Privacy-First Design']
    ],
    [
        'title' => 'Cyberguard',
        'tags' => ['Python', 'Cybersecurity', 'AI', 'Threat Detection'],
        'description' => 'An AI-driven security tool that analyzes network patterns and user behavior to detect and alert on potential cybersecurity threats in real-time.',
        'impact' => 'Helps organizations identify suspicious activity before breaches occur, strengthening their security posture.',
        'image' => 'assets/images/cyber.png',
        'link' => 'https://github.com/LithiumHydroxide/Cyber-Guard-AI',
        'github' => true,
        'features' => ['Anomaly Detection', 'Real-time Alerts', 'Threat Logging', 'Dashboard Visualization', 'Configurable Rules']
    ],
    [
        'title' => 'Sport Management',
        'tags' => ['PHP', 'MySQL', 'Event Management', 'Seat Selection'],
        'description' => 'A match ticketing system that allows fans to browse events, select seats interactively, and complete secure bookings with real-time availability updates.',
        'impact' => 'Enabled seamless ticket sales for local sports events with zero double-booking incidents.',
        'image' => 'assets/images/sport.png',
        'link' => 'https://github.com/LithiumHydroxide/sport',
        'github' => true,
        'features' => ['Interactive Seat Map', 'Real-time Availability', 'Secure Checkout', 'E-Ticket Generation', 'Event Analytics']
    ],
    [
        'title' => 'School Management',
        'tags' => ['PHP', 'Laravel', 'MySQL', 'Education'],
        'description' => 'A full-featured school administration platform managing student records, attendance, grades, fee payments, and parent-teacher communication.',
        'impact' => 'Digitized administrative workflows for schools, reducing paperwork by 70% and improving data accuracy.',
        'image' => 'assets/images/skool.png',
        'link' => 'contact.php?project=school-system',
        'github' => false,
        'features' => ['Student Portal', 'Attendance Tracking', 'Grade Management', 'Fee Collection', 'SMS Notifications']
    ],
    [
        'title' => 'Mpesa STK',
        'tags' => ['PHP', 'M-Pesa API', 'Payment Gateway', 'Kenya'],
        'description' => 'A lightweight PHP library for integrating Safaricom\'s M-Pesa STK Push functionality into web applications, enabling seamless mobile money payments.',
        'impact' => 'Simplified payment integration for Kenyan businesses, reducing development time from days to hours.',
        'image' => 'assets/images/mpesa.jpg',
        'link' => 'https://github.com/LithiumHydroxide/Mpesa-STK',
        'github' => true,
        'features' => ['STK Push Trigger', 'Callback Handling', 'Transaction Verification', 'Error Logging', 'Easy Configuration']
    ]
];

// Helper function for URL-friendly slugs
function slugify($text) {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
}
?>
