@extends('layouts.app')

@section('headData')

<style>
</style>

@endsection

@section('wrapper')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(Session::has('success'))
                    <div class="alert-box success">
                        <h2>{!! Session::get('success') !!}</h2>
                    </div>
                @endif
                @if(Session::has('error'))
                    <p class="errors">{!! Session::get('error') !!}</p>
                @endif
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
                    <h2>Задание №3</h2>

                    {{ Form::open(array('url'=>'third','method'=>'POST','files'=>true)) }}
                    <div class="form-inline">
                        <div class="form-group">
                            {{ Form::label('weight', 'Ваш Вес') }}
                            {{ Form::input('text', 'weight',null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('length', 'Размер груди') }}
                            {{ Form::input('text', 'length',null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    {{ Form::submit('Submit', array('class'=>'send-btn')) }}
                    {{ Form::close() }}
                </section>
            </div>
        </div>
    </div>

@endsection