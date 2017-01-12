function sendReport() {
    var form = $('#report'),
        message = CKEDITOR.instances.message.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'message': message
    };

    $.ajax({
        method: 'POST',
        url: 'edit/report',
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