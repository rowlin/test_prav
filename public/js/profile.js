function edit_profile() {
    var form = $('#profile'),
        name = $('#profileName').val(),
        surname = $('#profileSurname').val(),
        phone = $('#profilePhone').val(),
        birthday = $('#profileBirthday').val(),
        gender = $('#profileGender').val(),
        country = $('#profileCountry').val(),
        city = $('#profileCity').val(),
        email = $('#profileEmail').val(),
        formData = {
        '_token': $('meta[name="_token"]').attr('content'),
        'name': name,
        'surname': surname,
        'phone': phone,
        'birthday': birthday,
        'gender': gender,
        'country': country,
        'city': city,
        'email': email
    };
    var valid = validateData(formData);
    if(!valid) {
        form.find('.error').html('Заполните все обязательные поля');
        return false;
    }
    $.ajax({
        method: 'POST',
        url: 'edit/profile',
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

function validateData(data) {
    var res = 1;
    if(!data.name.length) {res = 0}
    if(!data.surname.length) {res = 0}
    if(!data.phone.length) {res = 0}
    if(!data.birthday.length) {res = 0}
    if(!data.country.length) {res = 0}
    if(!data.city.length) {res = 0}
    if(!data.email.length) {res = 0}
    return res;
}