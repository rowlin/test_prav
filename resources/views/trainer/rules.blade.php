@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/rules.js')}}"></script>
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <h1>Правила</h1>
                <div id="formRules">
                <form>
                        <textarea name="desc" id="rules" rows="10" cols="80">
                            @foreach($rules as $rule)
                                {{$rule->description}}
                            @endforeach
                        </textarea>
                    <script>
                        CKEDITOR.replace( 'desc' );
                    </script>
                </form>
                <div id="redRules" class="btn btn-default">
                    <a>Редактировать правила</a>
                </div>
                </div>
            </div>

        </section>
    </section>

    <script>
        var form = $('#formRules');
        form.on('click', '#redRules', function() {
            redRules();
        })
    </script>
@endsection
