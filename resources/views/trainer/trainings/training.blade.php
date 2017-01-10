@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/training.js')}}"></script>
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <div id="redact" class="btn btn-default">
                    <a>Редактировать</a>
                </div>
                <div id="training">
                    <h1>Тренировка №{{$training->id}}</h1>
                    <input id="heading" name="heading" type="text" value="{{$training->heading}}">
                    <form>
                        <textarea name="shortDesc" id="shortDesc" rows="10" cols="80">
                            {{$training->short_desc}}
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'shortDesc' );
                        </script>
                    </form>
                    <form>
                        <textarea name="desc" id="desc" rows="10" cols="80">
                            {{$training->description}}
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'desc' );
                        </script>
                    </form>
                    <div class="error"></div>
                    <div class="btn btn-default">
                        <a href="{{URL::asset('/trainer/trainings')}}">К списку тренировок</a>
                    </div>
                </div>
            </div>

        </section>
    </section>

    <script>
        $(document).on('click', '#redact', function() {
            var id = '{{$training->id}}';
            redactTraining(id);
        })
    </script>

@endsection