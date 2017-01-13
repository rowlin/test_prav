@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/faq.js')}}"></script>
@endsection
<?php ?>
@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <h1>Входящие вопросы</h1>
                @foreach($faq as $f)
                    <div class="answer">
                        <div>
                            {{($f->message)}}
                        </div>
                        <div data-id="{{$f->id}}" class="addAnswer btn btn-default">
                            <a href="{{URL::asset('/trainer/faq/'.$f->id)}}">Ответить</a>
                        </div>

                    </div>
                @endforeach
            </div>
        </section>
    </section>

    <script>
        $(function(){
            $(".addAnswer").click(function(){
                var id =  $(this).data("id");
                $('.id'+id).show();
            });
        });
    </script>


@endsection