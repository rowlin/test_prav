function addTraining() {
    var form = $('#addTraining'),
        heading = form.find('input[id=heading]').val(),
        shortDesc = CKEDITOR.instances.shortDesc.getData(),
        desc = CKEDITOR.instances.desc.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'heading': heading,
        'shortDesc': shortDesc,
        'desc': desc
    };

    $.ajax({
        method: 'POST',
        url: '/add/training',
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

function redactTraining(id) {
    var form = $('#training'),
        heading = form.find('input[id=heading]').val(),
        shortDesc = CKEDITOR.instances.shortDesc.getData(),
        desc = CKEDITOR.instances.desc.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'heading': heading,
        'shortDesc': shortDesc,
        'desc': desc
    };

    $.ajax({
        method: 'POST',
        url: '/red/training/'+id,
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