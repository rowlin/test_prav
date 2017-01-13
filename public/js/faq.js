function sendQuest() {
    var message = CKEDITOR.instances.message.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'message': message
    };

    $.ajax({
        method: 'POST',
        url: 'edit/faq',
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

function sendAnswerFaq(id, user_id) {
    var message = CKEDITOR.instances.message.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'message': message,
        'id': id,
        'user_id': user_id
    };

    $.ajax({
        method: 'POST',
        url: '/add/answer',
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

function editAnswerFaq(id, user_id) {
    var message = CKEDITOR.instances.message.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'message': message,
        'id': id,
        'user_id': user_id
    };

    $.ajax({
        method: 'POST',
        url: '/edit/answer',
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