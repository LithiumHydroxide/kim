<?php
$pages = ['index.php', 'contact.php', 'projects.php', 'services.php'];
foreach ($pages as $page) {
    ob_start();
    include $page;
    $html = ob_get_clean();
    file_put_contents(str_replace('.php', '.html', $page), $html);
}
echo "Generated static HTML files.\n";
