$.ajaxSetup({
    headers: {
        '_token': $('meta[name="_token"]').attr('content')
    }
});

function hasError(form){
    form.find('.error').html('Заполните все обязательные поля');
    return false;
}