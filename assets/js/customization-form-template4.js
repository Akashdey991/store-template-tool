$(document).ready(function() {
    // Remove any existing event handlers to prevent duplicates
    $('#template4CustomizationForm').off('submit');
    $('#storeLogo').off('change');
    $('#primaryColor, #secondaryColor').off('input');
    $('#fontStyle').off('change');
    $('#layoutStyle').off('change');

    // Handle form submission
    $('#template4CustomizationForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get form values
        const storeName = $('#storeName').val();
        const primaryColor = $('#primaryColor').val();
        const secondaryColor = $('#secondaryColor').val();
        const fontStyle = $('#fontStyle').val();
        const layoutStyle = $('#layoutStyle').val();
        
        // Log the values (for now)
        console.log('Store Name:', storeName);
        console.log('Primary Color:', primaryColor);
        console.log('Secondary Color:', secondaryColor);
        console.log('Font Style:', fontStyle);
        console.log('Layout Style:', layoutStyle);
        
        // Show success message
        alert('Template 4 customization saved successfully!');
    });

    // Handle logo preview
    $('#storeLogo').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#logoPreview').html(`
                    <img src="${e.target.result}" class="img-thumbnail" style="max-height: 100px;">
                `);
            }
            reader.readAsDataURL(file);
        }
    });

    // Live preview for color changes
    $('#primaryColor, #secondaryColor').on('input', function() {
        const primaryColor = $('#primaryColor').val();
        const secondaryColor = $('#secondaryColor').val();
        
        // Update preview elements with new colors
        $('.preview-primary').css('color', primaryColor);
        $('.preview-secondary').css('background-color', secondaryColor);
    });

    // Live preview for font changes
    $('#fontStyle').on('change', function() {
        const fontFamily = $(this).val();
        $('.preview-text').css('font-family', fontFamily);
    });

    // Live preview for layout changes
    $('#layoutStyle').on('change', function() {
        const layout = $(this).val();
        // Update preview layout based on selection
        $('.preview-layout').removeClass('grid list masonry').addClass(layout);
    });
}); 