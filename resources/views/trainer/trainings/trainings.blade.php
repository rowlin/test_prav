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
        })
    </script>

@endsection