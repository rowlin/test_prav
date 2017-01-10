<head>
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <meta name="_token" content="{{ csrf_token() }}" />

<div id="test">
<input type="file" id="uploadFile" name="uploadFile">

<input id="testbtn" type="submit" value="Загрузить" class="btn btn-default">
</div>

    <div id="testDiv"></div>

    <div class="ajax-respond"></div>

<script>
    $('#test').on('click', '#testbtn', function() {
        var formData = {
            '_token': $('meta[name="_token"]').attr('content'),
            'img': $('#uploadFile').val()
        };
        $.ajax({
            method: 'POST',
            url: '/check/test',
            data: formData,
            beforeSend: function() {
                console.log('load')
            },
            success: function(dataBack) {
                console.log(dataBack)
            },
            error: function(jqXHR) {
                $('#testDiv').html(jqXHR.responseText);
            }
        })
    })

</script>