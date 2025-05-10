// Highlight selected card and show customization form placeholder
$(document).ready(function() {
    $('.select-btn').on('click', function() {
        var templateId = $(this).data('template');
        window.selectedTemplateId = templateId; // Store globally
        $('.template-card').removeClass('selected-card');
        $('#card-' + templateId).addClass('selected-card');
        // Load the customization form via AJAX
        var formFile = 'customization-form-template' + templateId + '.html';
        $('#customization-form-container').html('<div class="text-center my-4">Loading form...</div>');
        $.get(formFile, function(data) {
            $('#customization-form-container').html(data);
            // Dynamically load the relevant JS for the form if it exists
            var jsFile = 'assets/js/customization-form-template' + templateId + '.js';
            $.get(jsFile)
                .done(function(scriptContent) {
                    // Remove any previously loaded form JS
                    $("#customization-form-js").remove();
                    // Add new script
                    var script = document.createElement('script');
                    script.id = "customization-form-js";
                    script.type = 'text/javascript';
                    script.text = scriptContent;
                    document.body.appendChild(script);
                });
        }).fail(function() {
            $('#customization-form-container').html('<div class="alert alert-danger mt-4">Customization form not found for Template ' + templateId + '.</div>');
        });
    });
    // Preview button opens template in new tab
    $('.preview-btn').on('click', function() {
        var templateId = $(this).data('template');
        window.open('assets/templates/template' + templateId + '/index.html', '_blank');
    });
});