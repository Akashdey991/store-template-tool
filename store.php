<?php
// store.php - Frontend Store View

// Get store_id from URL
$store_id = isset($_GET['store_id']) ? intval($_GET['store_id']) : 0;

if ($store_id <= 0) {
    echo '<h2>Invalid or missing store ID.</h2>';
    exit;
}

require 'includes/db.php';

// Fetch customization data for this store_id
$stmt = $pdo->prepare('SELECT * FROM customizations WHERE id = ?');
$stmt->execute([$store_id]);
$customization = $stmt->fetch();

if (!$customization) {
    echo '<h2>No customization found for this store.</h2>';
    exit;
}

$template_id = isset($customization['template_id']) ? intval($customization['template_id']) : 1;
$template_path = __DIR__ . "/assets/templates/template{$template_id}/index.html";

if (!file_exists($template_path)) {
    echo '<h2>Template not found.</h2>';
    exit;
}

// Read and output the template HTML
$template_html = file_get_contents($template_path);

// Replace store name in banner (Welcome to Our Store)
if (!empty($customization['store_name'])) {
    $template_html = str_replace('Welcome to Our Store', htmlspecialchars($customization['store_name']), $template_html);
}

// Replace logo path (images/logo.svg)
$logoPathToUse = !empty($customization['logo_path']) ? htmlspecialchars($customization['logo_path']) : 'images/logo.svg';
$template_html = str_replace('images/logo.svg', $logoPathToUse, $template_html);

// Inject primary color as a CSS variable in <head>
if (!empty($customization['primary_color'])) {
    $primaryColor = htmlspecialchars($customization['primary_color']);
    $template_html = str_replace('</head>', "<style>:root { --primary-color: $primaryColor; }</style>\n</head>", $template_html);
}

// Inject secondary color as a CSS variable in <head>
if (!empty($customization['secondary_color'])) {
    $secondaryColor = htmlspecialchars($customization['secondary_color']);
    $template_html = str_replace('</head>', "<style>:root { --secondary-color: $secondaryColor; }</style>\n</head>", $template_html);
}

// Replace banner image (images/banner.jpg)
if (!empty($customization['banner_image'])) {
    $template_html = str_replace('images/banner.jpg', htmlspecialchars($customization['banner_image']), $template_html);
}

// Inject font style as a CSS variable in <head>
if (!empty($customization['font_style'])) {
    $fontStyle = htmlspecialchars($customization['font_style']);
    $template_html = str_replace('</head>', "<style>:root { --font-style: '$fontStyle'; }</style>\n</head>", $template_html);
}

// Inject layout style as a CSS variable in <head>
if (!empty($customization['layout_style'])) {
    $layoutStyle = htmlspecialchars($customization['layout_style']);
    $template_html = str_replace('</head>', "<style>:root { --layout-style: '$layoutStyle'; }</style>\n</head>", $template_html);
}

// Fix all image paths to be absolute from the project root
$template_html = str_replace('src="images/', 'src="/assets/templates/template1/images/', $template_html);

echo $template_html;
