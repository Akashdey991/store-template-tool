$(document).ready(function() {
    // Banner image live preview
    $('#bannerImage2').on('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                $('#bannerPreview2').html('<img src="' + evt.target.result + '" alt="Banner Preview">');
            };
            reader.readAsDataURL(file);
        } else {
            $('#bannerPreview2').empty();
        }
    });

    // Color picker live preview for both colors
    $('#primaryColor2').on('input', function() {
        $(this).css('background', $(this).val());
    });
    $('#secondaryColor2').on('input', function() {
        $(this).css('background', $(this).val());
    });

    // Form submit: prevent default and log data
    $('#customize-template2').off('submit');
    $('#customize-template2').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        console.log('Store Name:', formData.get('storeName'));
        console.log('Primary Color:', formData.get('primaryColor'));
        console.log('Secondary Color:', formData.get('secondaryColor'));
        console.log('Category Title:', formData.get('categoryTitle'));
        if (formData.get('bannerImage')) {
            console.log('Banner Image:', formData.get('bannerImage').name);
        }
        alert('Customization data captured! (Check console for details)');
    });
}); 