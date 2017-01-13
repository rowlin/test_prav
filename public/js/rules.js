function redRules() {
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'description': CKEDITOR.instances.rules.getData()
    };

    $.ajax({
        method: 'POST',
        url: '/edit/rules',
        data: formData,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            if(!data.result) {
                $('.error').html('').html(data.display);
            } else {
                location.reload();
            }
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    })
}