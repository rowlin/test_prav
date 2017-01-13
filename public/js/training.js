function addTraining() {
    var form = $('#addTraining'),
        heading = form.find('input[id=heading]').val(),
        shortDesc = CKEDITOR.instances.shortDesc.getData(),
        desc = CKEDITOR.instances.desc.getData(),
        date_start = form.find('input[id=date_start]').val(),
        date_end = form.find('input[id=date_end]').val();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'heading': heading,
        'shortDesc': shortDesc,
        'desc': desc,
        'date_start': date_start,
        'date_end': date_end
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
        desc = CKEDITOR.instances.desc.getData(),
        date_start = form.find('input[id=date_start]').val(),
        date_end = form.find('input[id=date_end]').val();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'heading': heading,
        'shortDesc': shortDesc,
        'desc': desc,
        'date_start': date_start,
        'date_end': date_end
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

function reportTraining(id) {
    var message = CKEDITOR.instances.message.getData();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'message': message
    };

    $.ajax({
        method: 'POST',
        url: '/add/report_training/'+id,
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