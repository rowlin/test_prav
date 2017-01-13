function openAccess(id) {
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'id': id
    };

    $.ajax({
        method: 'POST',
        url: '/access/open/'+id,
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

function closeAccess(id) {
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'id': id
    };

    $.ajax({
        method: 'POST',
        url: '/access/close/'+id,
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