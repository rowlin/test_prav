function first_task() {
    var form = $('#task1');
    var name = form.find('input[id=name]').val();
    var surname = form.find('input[id=surname]').val();
    var phone = form.find('input[id=phone]').val();
    var birthday = form.find('input[id=birthday]').val();
    var gender = form.find('select[id=gender]').val();
    var country = form.find('input[id=country]').val();
    var city = form.find('input[id=city]').val();
    var email = form.find('input[id=email]').val();
    var username = form.find('input[id=username]').val();
    var password = form.find('input[id=password]').val();
    /*var avatar = form.find('input[id=avatar]').val();
    var file;
    form.find('input[id=avatar]').change(function(){
        file = this.files;
    });*/
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'name': name,
        'surname': surname,
        'phone': phone,
        'birthday': birthday,
        'gender': gender,
        'country': country,
        'city': city,
        'email': email,
        'username': username,
        'password': password
        //'avatar': file
    };
    var valid = validateFirstData(formData);
    if(!valid) {
        return hasError(form);
    }
    $.ajax({
        method: 'POST',
        url: '/task1',
        data: formData,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            if (!data.result) {
                $('.error').html('').html(data.display);
            } else {
                /*var change = data.display;
                localStorage.setItem("change", change);*/
                var url = "/tasks";
                $(location).attr('href',url);
            }
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    })
}

function second_task() {
    var form = $('#task2'),
        weight = form.find('input[id=weight]').val(),
        waist = form.find('input[id=waist]').val(),
        chest = form.find('input[id=chest]').val(),
        hip = form.find('input[id=hip]').val();
    var formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'weight': weight,
        'waist': waist,
        'chest': chest,
        'hip': hip
    };
    var valid = validateSecondData(formData);
    if(!valid) {
        return hasError(form);
    }

    $.ajax({
        method: 'POST',
        url: '/task2',
        data: formData,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            if (!data.result) {
                $('.error').html('').html(data.display);
            } else {
                /*var change = data.display;
                 localStorage.setItem("change", change);*/
                var url = "/tasks";
                $(location).attr('href',url);
            }
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    })

}

function third_task() {
    var form = $('#task3'),
        weight = form.find('input[id=weight]').val(),
        length = form.find('input[id=length]').val(),
        formData = {
            '_token': $('meta[name="_token"]').attr('content'),
            'weight': weight,
            'length': length
        };
    var valid = validateThirdData(formData);
    if(!valid) {
        return hasError(form);
    }
    $.ajax({
        method: 'POST',
        url: '/task3',
        data: formData,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            if (!data.result) {
                $('.error').html('').html(data.display);
            } else {
                var url = "/tasks";
                $(location).attr('href',url);
            }
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    })
}

function validateFirstData(data) {
    var res = 1;
    if(!data.name.length) {res = 0}
    if(!data.surname.length) {res = 0}
    if(!data.phone.length) {res = 0}
    if(!data.birthday.length) {res = 0}
    if(!data.country.length) {res = 0}
    if(!data.city.length) {res = 0}
    if(!data.email.length) {res = 0}
    if(!data.username.length) {res = 0}
    if(!data.password.length) {res = 0}
    return res;
}

function validateSecondData(data) {
    var res = 1;
    if(!data.weight.length) {res = 0}
    if(!data.waist.length) {res = 0}
    if(!data.chest.length) {res = 0}
    if(!data.hip.length) {res = 0}
    return res;
}

function validateThirdData(data) {
    var res = 1;
    if(!data.weight.length) {res = 0}
    if(!data.length.length) {res = 0}
    return res;
}

function getFirstChange() {
    var change;
    $.ajax({
        method: 'GET',
        url: '/checkFirstTask',
        async: false,
        beforeSend: function() {
          console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            change = data.result;
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    });
    return change;
}

function getSecondChange() {
    var change;
    $.ajax({
        method: 'GET',
        url: '/checkSecondTask',
        async: false,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            change = data.result;
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    });
    return change;
}

function getThirdChange() {
    var change;
    $.ajax({
        method: 'GET',
        url: '/checkThirdTask',
        async: false,
        beforeSend: function() {
            console.log('load');
        },
        success: function(dataBack) {
            var data = JSON.parse(dataBack);
            change = data.result;
        },
        error: function(jqXHR) {
            $('#testDiv').html(jqXHR.responseText);
        }
    });
    return change;
}