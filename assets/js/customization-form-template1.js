$(document).ready(function() {
    // Banner image live preview
    $('#bannerImage').on('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                $('#bannerPreview').html('<img src="' + evt.target.result + '" alt="Banner Preview">');
            };
            reader.readAsDataURL(file);
        } else {
            $('#bannerPreview').empty();
        }
    });

    // Color picker live preview (optional: show color value)
    $('#primaryColor').on('input', function() {
        $(this).css('background', $(this).val());
    });

    // Logo image live preview
    $('#logo').on('change', function(e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function(evt) {
                $('#logoPreview').html('<img src="' + evt.target.result + '" alt="Logo Preview" style="max-height: 60px;">');
            };
            reader.readAsDataURL(file);
        } else {
            $('#logoPreview').empty();
        }
    });

    // Form submit: prevent default and log data
    $('#customize-template1').off('submit');
    $('#customize-template1').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        if (window.selectedTemplateId) {
            formData.append('template_id', window.selectedTemplateId);
        }

        $.ajax({
            url: 'save-customization.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success' && response.store_id) {
                    window.location.href = 'store.php?store_id=' + response.store_id;
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred while saving customization.');
            }
        });
    });

    $('#template4CustomizationForm').on('submit', function(e) {
        e.preventDefault();

        // Collect form data
        const formData = {
            storeName: $('#storeName').val(),
            logoPath: $('#storeLogo').val(), // Adjust if you handle file uploads differently
            primaryColor: $('#primaryColor').val(),
            secondaryColor: $('#secondaryColor').val(),
            fontStyle: $('#fontStyle').val(),
            layoutStyle: $('#layoutStyle').val()
        };

        // AJAX request
        $.ajax({
            url: 'save-customization.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success' && response.store_id) {
                    window.location.href = 'store.php?store_id=' + response.store_id;
                } else {
                    alert(response.message);
                }
            },
            error: function() {
                alert('An error occurred while saving customization.');
            }
        });
    });
}); 