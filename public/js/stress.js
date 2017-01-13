function addTest() {
    var form = $('#addTest'),
        heading = form.find('input[id=heading]').val(),
        shortDesc = CKEDITOR.instances.shortDesc.getData(),
        desc = CKEDITOR.instances.desc.getData(),
        date_start = form.find('input[id=date_start]').val();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'heading': heading,
        'shortDesc': shortDesc,
        'desc': desc,
        'date_start': date_start
    };

    $.ajax({
        method: 'POST',
        url: '/add/test',
        data: formData,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            if(!data.result) {
                $('.error').html('').html(data.display);
            } else {
                console.log(data.display);
                //location.reload();
            }
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    })
}

function redactTest(id) {
    var form = $('#test'),
        heading = form.find('input[id=heading]').val(),
        shortDesc = CKEDITOR.instances.shortDesc.getData(),
        desc = CKEDITOR.instances.desc.getData(),
        date_start = form.find('input[id=date_start]').val();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'heading': heading,
        'shortDesc': shortDesc,
        'desc': desc,
        'date_start': date_start
    };

    $.ajax({
        method: 'POST',
        url: '/red/test/'+id,
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