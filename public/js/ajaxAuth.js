function ajaxRegister() {
    var form = $('#authRegForm');
    var name = form.find('input[id=regName]').val();
    var email = form.find('input[id=regEmail]').val();
    var phone = form.find('input[id=regPhone]').val();
    var code = form.find('input[id=regCode]').val();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'name': name,
        'email': email,
        'phone': phone,
        'code': code
    };
    var valid = validateRegData(formData);
    if(!valid) {
        return hasError(form);
    }
    $.ajax({
        method: 'POST',
        url: '/registerUser',
        data: formData,
        beforeSend: function() {
            console.log('before');
        },
        success: function(formData) {
            var data = JSON.parse(formData);
            if(!data.result) {
                $('.errorText').html('').html(data.display);
            } else {
                location.reload();
            }

        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    })
}

function ajaxLogin() {
    var form = $('#loginForm');
    var username = form.find('input[id=username]').val();
    var password = form.find('input[id=password]').val();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'username': username,
        'password': password
    };
    var valid = validateLoginData(formData);
    if(!valid) {
        return hasError(form);
    }
    $.ajax({
        method: 'POST',
        url: '/loginUser',
        data: formData,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            if(data.display == false) {
                location.reload();
            } else {
                $('.error').html('').html(data.display);
            }
        },
        error: function (jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    })
}

function validateRegData(data) {
    var res = 1;
    if(!data.name.length) {res = 0}
    if(!data.email.length) {res = 0}
    if(!data.phone.length) {res = 0}
    return res;
}

function validateLoginData(data) {
    var res = 1;
    if(!data.username.length) {res = 0}
    if(!data.password.length) {res = 0}
    return res;
}