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
                <div>
                    {{$question->question_message}}
                </div>
                <div class="showForm">
                    <form>
                                <textarea name="message" id="message" rows="10" cols="80">
                                    {{$question->answer_message}}
                                </textarea>
                        <script>
                            CKEDITOR.replace( 'message' );
                        </script>
                    </form>
                    <div class="error"></div>
                    @if(!$question->answer_message)
                        <div id="send" class="btn btn-default">
                            <a>Отправить ответ</a>
                        </div>
                    @endif
                    @if($question->answer_message)
                        <div id="edit" class="btn btn-default">
                            <a>Редактировать ответ</a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </section>

    <script>
        var id = '{{$question->question_id}}';
        var user_id = '{{$question->user_id}}';

        $(document).on('click', '#send', function() {
            sendAnswerFaq(id, user_id);
        });

        $(document).on('click', '#edit', function() {
            editAnswerFaq(id, user_id);
        })
    </script>


@endsection