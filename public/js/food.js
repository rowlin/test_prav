function foodAnketa(id) {
    var desc = CKEDITOR.instances.desc.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'desc': desc
    };

    $.ajax({
        method: 'POST',
        url: '/add/food/'+id,
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

function redFoodAnketa(id) {
    var desc = CKEDITOR.instances.desc.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'desc': desc
    };

    $.ajax({
        method: 'POST',
        url: '/add/food/'+id,
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