@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/faq.js')}}"></script>
    <script src="{{URL::asset('js/ajaxTasks.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerUser')
        @include('elements.nav2user')

        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navUser')

            <div class="col-md-8 col-md-offset-2">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <section>
                    <h2>Первая задача</h2>
                    <form  action="{{ url('first') }}" enctype="multipart/form-data" method="post" >
                        <div class="form-group">
                         <label for="username">Введите имя :</label>
                            <input class="form-control" type="text" name="username">
                        </div>
                        <div class="form-group">
                         <label for="surname">Введите фамилию:</label>
                            <input class="form-control" type="text" name="surname">
                         </div>
                        <div class="form-group" >
                            <label for="birthday">Ваша дата рождения :</label>
                                <div class="input-group "  >
                                    <input type="text"  id="datepicker" name="birthday" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                         </div>
                        <div class="form-group">
                            <label for="gender">Выберете пол :</label>
                                 <select name="gender" class="form-control">
                                     <option value="1">Мужской</option>
                                     <option value="0">Женский</option>
                                 </select>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                         <label for="country">Укажите страну:</label>
                        <input type="text" name="country" class="form-control" placeholder="Россия"  >
                            </div>
                            <div class="form-group">
                        <label for="city">Укажите город:</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="Санкт-петербург">
                            </div>
                        </div><!--form-inline-->
                        <div class="form-group">

                        <label for="avatar">Загрузите Аватарку:</label>
                        <input type="file" name="image"  id="avatar">
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <button type="submit" class="btn btn-default">Отправить</button>
                    </form>
                </section>
            </div><!--col-->
        </div>
    </section>


    <script>
        $('#datepicker').datepicker({format: 'yyyy-mm-dd', locale:'ru'})

    </script>


@endsection
