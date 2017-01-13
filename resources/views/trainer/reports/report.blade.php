@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/report.js')}}"></script>
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                Отчет: {{$report->report_message}}
                @if(!$report->answer_message)
                <div id="report">
                    <table class="w_100 appraisal_tab_3a">
                        <form>
                        <textarea name="msg" id="msg" rows="10" cols="80">

                        </textarea>
                            <script>
                                CKEDITOR.replace( 'msg' );
                            </script>
                        </form>
                        <tr class="">
                            <td class="">
                                <div class="appraisal_3a">
                                    Отлично
                                    <input type="radio" name="report1" class="radio_3a" id="radio_3a" />
                                    <label for="radio_3a"></label></div>
                            </td>
                            <td class="">
                                <div class="appraisal_3a">
                                    Хорошо
                                    <input type="radio" name="report1" class="radio_3a" id="radio2_3a" />
                                    <label for="radio2_3a"></label></div>
                            </td>
                            <td class="">
                                <div class="appraisal_3a">
                                    Так себе
                                    <input type="radio" name="report1" class="radio_3a" id="radio3_3a" />
                                    <label for="radio3_3a"></label></div>
                            </td>
                            <td class="">
                                <div class="appraisal_3a">
                                    Плохо
                                    <input type="radio" name="report1" class="radio_3a" id="radio4_3a" />
                                    <label for="radio4_3a"></label></div>
                            </td>
                            <td class="">
                                <div class="appraisal_3a">
                                    Мда..
                                <input type="radio" name="report1" class="radio_3a" id="radio5_3a" />
                                <label for="radio5_3a"></label></div>
                            </td>
                        </tr>
                    </table>
                    <div class="error"></div>
                    <div id="addAnsw" class="btn btn-default">
                        <a>Ответить</a>
                    </div>
                </div>
                @endif
                @if($report->answer_message)
                    <div>Ответ: {{$report->answer_message}}</div>
                @endif
            </div>

        </section>
    </section>

    <script>
        var form = $('#report');
        var mark = 0;
        form.on('click', '#addAnsw', function() {
            if($('input:radio[id=radio_3a]:checked').val() == 'on') {
                mark = 1;
            }
            if($('input:radio[id=radio2_3a]:checked').val() == 'on') {
                mark = 2;
            }
            if($('input:radio[id=radio3_3a]:checked').val() == 'on') {
                mark = 3;
            }
            if($('input:radio[id=radio4_3a]:checked').val() == 'on') {
                mark = 4;
            }
            if($('input:radio[id=radio5_3a]:checked').val() == 'on') {
                mark = 5;
            }
            var user_id = '{{$report->user_id}}';
            var report_id = '{{$report->report_id}}';
            answerReport(user_id, report_id, mark);
        })
    </script>
@endsection