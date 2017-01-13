@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/training.js')}}"></script>
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('wrapper')

    <section class="fon_2">
        @include('elements.headerUser')
        @include('elements.nav2user')

        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navUser')
                <section class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                    <div class="row">
                Заголовок: {{$training->heading}} <br>
                Краткое описание: {{$training->short_desc}} <br>
                Описание: {{$training->description}} <br>
                Дата окончания: {{$training->date_end}}
                @if($training->training_id == '')
                <div id="report">
                    <form>
                        <textarea name="msg" id="message" rows="10" cols="80">

                        </textarea>
                        <script>
                            CKEDITOR.replace( 'msg' );
                        </script>
                    </form>
                    <div class="error"></div>
                    <div id="addReport" class="btn btn-default">
                        <a>Ответить</a>
                    </div>
                </div>
                @endif
                @if($training->training_id)
                    <div class="pd_top_20_3a">
                        <div class="bloc_2_3a">
                            <div class="circle_bloc_3a"> <div id="circle_3a"></div> </div>
                            <div class="otchet_3a"> отчет </div>
                            <div class="report">
                                {{$training->message}}
                            </div>
                            <table class="w_100 appraisal_tab_3a">
                                <tr class="">
                                    <td class="">
                                        <div class="appraisal_3a">
                                            Отлично
                                            <input type="radio" name="report1" class="radio_3a" id="radio_3a" />
                                            <label for="radio_3a"></label>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="appraisal_3a">
                                            Хорошо
                                            <input type="radio" name="report1" class="radio_3a" id="radio2_3a" />
                                            <label for="radio2_3a"></label>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="appraisal_3a">
                                            Так себе
                                            <input type="radio" name="report1" class="radio_3a" id="radio3_3a" />
                                            <label for="radio3_3a"></label>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="appraisal_3a">
                                            Плохо
                                            <input type="radio" name="report1" class="radio_3a" id="radio4_3a" />
                                            <label for="radio4_3a"></label>
                                        </div>
                                    </td>
                                    <td class="">
                                        <div class="appraisal_3a">Мда..</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
                </div>
                </section>
            </div>

        </section>
    </section>

    <script>
        var form = $('#report');
        form.on('click', '#addReport', function() {
            var training_id = '{{$training->id}}';
            reportTraining(training_id);
        })
    </script>
@endsection