@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/food.js')}}"></script>
@endsection
<?php ?>
@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <h1>Анкета участника <a href="{{URL::asset('/users/'.$food->id)}}">{{$food->name}} {{$food->surname}}</a></h1>
                <div id="anketa">
                    <form>
                        <textarea name="desc" id="desc" rows="10" cols="80">
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'desc' );
                        </script>
                    </form>
                    <div id="redact" class="btn btn-default">
                        <a>Редактировать анкету</a>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <script>
        var form = $('#anketa');
        form.on('click', '#redact', function() {
            var id = '{{$food->id}}';
            foodAnketa(id);
        })
    </script>
@endsection