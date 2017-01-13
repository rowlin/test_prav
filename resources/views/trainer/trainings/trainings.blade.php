@extends('layouts.app')

@section('headData')
    <script src="{{URL::asset('js/ckeditor/ckeditor.js')}}"></script>
    <script src="{{URL::asset('js/training.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-datepicker3.standalone.min.css')}}">
@endsection

@section('wrapper')
    <section class="fon_2">
        @include('elements.headerTrainer')
        <section class="container">   <!-- ~~~  class="page" ~~~ -->
            <div class="row">
                @include('elements.navTrainer')
                <div id="openAdd" class="btn btn-default">
                    <a>Добавить тренировку</a>
                </div>
                <div id="addTraining" style="display: none">
                    <input type="text" id="heading" name="heading" placeholder="Название тренировки">
                    <form>
                        <textarea name="shortDesc" id="shortDesc" rows="10" cols="80">

                        </textarea>
                        <script>
                            CKEDITOR.replace( 'shortDesc' );
                        </script>
                    </form>
                    <input type="file" id="imgDesc" name="imgDesc" placeholder="Изображение">
                    <input type="file" id="videoDesc" name="videoDesc" placeholder="Видео">
                    <form>
                        <textarea name="desc" id="desc" rows="10" cols="80">

                        </textarea>
                        <script>
                            CKEDITOR.replace( 'desc' );
                        </script>
                    </form>
                    <input class="form-control" type="text" name="date_start" id="date_start" placeholder="Дата старта">
                    <input class="form-control" type="text" name="date_end" id="date_end" placeholder="Дата окончания">
                    <div class="error"></div>
                    <div id="add" class="btn btn-default">
                        <a>Добавить тренировку</a>
                    </div>
                </div>
            </div>

            <div id="trainings">
                <?php
                $count = 1;
                ?>
                @foreach($training as $t)

                    <div>
                        <p>Тренировка №<?php echo $count ?></p>
                        <a href="{{URL::asset('trainings/'.$t->id)}}"><?php echo $t->heading ?></a>
                        <p><?php echo $t->short_desc ?></p>
                    </div>

                    <?php
                        $count++;
                    ?>

                @endforeach
            </div>

        </section>
    </section>

    <script>
        var form = $('#addTraining');
        form.on('click', '#add', function() {
            addTraining();
        });

        $(document).on('click', '#openAdd', function() {
            $('#addTraining').show();
        });

        form.find('input[id=date_start]').datepicker({
            weekStart: 1,
            language: "ru",
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });

        form.find('input[id=date_end]').datepicker({
            weekStart: 1,
            language: "ru",
            autoclose: true,
            todayHighlight: true,
            format: "yyyy-mm-dd"
        });
    </script>

@endsection