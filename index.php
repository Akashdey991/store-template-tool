<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Store Template</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- Custom CSS  -->
    <link rel="stylesheet" href="assets/css/template-selection.css">
</head>
<body>
    <div class="container">
        <div class="template-heading">Pick Your Favorite Store Template</div>
        <div class="row justify-content-center g-4 mb-5">
            <!-- Template Card 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card template-card text-center" id="card-1">
                    <img src="assets/templates/template1/images/thumbnail.svg" class="template-thumb" alt="Minimalist Template">
                    <div class="card-body">
                        <div class="template-title">Minimalist</div>
                        <div class="template-desc mb-3">Clean, simple, and modern design. Perfect for a fresh, distraction-free store.</div>
                        <button class="btn btn-outline-primary btn-template preview-btn" data-template="1">Preview</button>
                        <button class="btn btn-primary btn-template select-btn" data-template="1">Select</button>
                    </div>
                </div>
            </div>
            <!-- Template Card 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card template-card text-center" id="card-2">
                    <img src="assets/templates/template2/images/thumbnail.svg" class="template-thumb" alt="Modern Template">
                    <div class="card-body">
                        <div class="template-title">Modern</div>
                        <div class="template-desc mb-3">Sleek, bold, and feature-rich. Ideal for a trendy, professional store.</div>
                        <button class="btn btn-outline-primary btn-template preview-btn" data-template="2">Preview</button>
                        <button class="btn btn-primary btn-template select-btn" data-template="2">Select</button>
                    </div>
                </div>
            </div>
            <!-- Template Card 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card template-card text-center" id="card-3">
                    <img src="assets/templates/template3/images/thumbnail.svg" class="template-thumb" alt="Classic Template">
                    <div class="card-body">
                        <div class="template-title">Classic</div>
                        <div class="template-desc mb-3">Sidebar navigation and warm colors. Great for a timeless, trusted look.</div>
                        <button class="btn btn-outline-primary btn-template preview-btn" data-template="3">Preview</button>
                        <button class="btn btn-primary btn-template select-btn" data-template="3">Select</button>
                    </div>
                </div>
            </div>
            <!-- Template Card 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card template-card text-center" id="card-4">
                    <img src="assets/templates/template4/images/thumbnail.svg" class="template-thumb" alt="Creative Template">
                    <div class="card-body">
                        <div class="template-title">Creative</div>
                        <div class="template-desc mb-3">Bold, animated, and unique. Perfect for creative brands and artists.</div>
                        <button class="btn btn-outline-primary btn-template preview-btn" data-template="4">Preview</button>
                        <button class="btn btn-primary btn-template select-btn" data-template="4">Select</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customization Form Placeholder -->
        <div id="customization-form-container"></div>
    </div>
    <!-- Bootstrap 5 JS & jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/template-selection.js"></script>
</body>
</html>
