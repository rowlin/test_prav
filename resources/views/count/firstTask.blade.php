@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ajaxTasks.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection


@section('wrapper')
    <div class="container">
        <div class="row">
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
                                    <input type="text" data-provide="datepicker" name="birthday" class="form-control">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                         </div>
                        <div class="form-group">
                            <label for="gender">Выберете пол :</label>
                                 <select name="gender" class="form-control">
                                     <option value="man">Мужской</option>
                                     <option value="woman">Женский</option>
                                 </select>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                         <label for="country">Укажите страну:</label>
                        <input type="text" class="form-control" name="country">
                            </div>
                            <div class="form-group">
                        <label for="city">Укажите город:</label>
                        <input type="text" name="city" class="form-control" id="city" placeholder="Город">
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
        </div><!--row-->
    </div><!--container-->



@endsection
