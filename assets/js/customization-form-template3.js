$(document).ready(function() {
    // Prevent double event binding
    $('#customize-template3').off('input change submit');

    // Live preview for primary color
    $('#primaryColor3').on('input', function() {
        const color = $(this).val();
        console.log('Primary Color:', color);
        // Update preview elements with primary color
        $('.preview-primary-color').css('color', color);
        $('.preview-primary-bg').css('background-color', color);
    });

    // Live preview for secondary color
    $('#secondaryColor3').on('input', function() {
        const color = $(this).val();
        console.log('Secondary Color:', color);
        // Update preview elements with secondary color
        $('.preview-secondary-color').css('color', color);
        $('.preview-secondary-bg').css('background-color', color);
    });

    // Logo preview
    $('#logo3').on('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                $('#logoPreview3').html('<img src="' + evt.target.result + '" alt="Logo Preview" style="max-height:100px;">');
            };
            reader.readAsDataURL(file);
        } else {
            $('#logoPreview3').empty();
        }
    });

    // Banner preview
    $('#bannerImage3').on('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                $('#bannerPreview3').html('<img src="' + evt.target.result + '" alt="Banner Preview">');
            };
            reader.readAsDataURL(file);
        } else {
            $('#bannerPreview3').empty();
        }
    });

    // Form submission
    $('#customize-template3').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        console.log('Store Name:', formData.get('storeName'));
        console.log('Primary Color:', formData.get('primaryColor'));
        console.log('Secondary Color:', formData.get('secondaryColor'));
        console.log('Welcome Text:', formData.get('welcomeText'));
        console.log('Footer Text:', formData.get('footerText'));
        if (formData.get('logo')) {
            console.log('Logo:', formData.get('logo').name);
        }
        if (formData.get('bannerImage')) {
            console.log('Banner Image:', formData.get('bannerImage').name);
        }
        alert('Customization data captured! (Check console for details)');
    });
}); 