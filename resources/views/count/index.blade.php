@extends('layouts.app')
@section('headData')
<style>
section{
    display: block;
    padding:10px;
}
section div{
    display: inline-block;
}

section img{
   width: 100px;;
}

section #name{
    padding :20px;
}

section #status{
    display: block;
    float: right;
}


section #status span{
     color:red;
}

section #many{
    padding: 20px;;
    display: block;
    float: right;
}

section #plus{
    font-size: 2rem;
}


section #minus{
    font-size: 2rem;
}



</style>
@endsection

@section('wrapper')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2"/>
            <h2>Панель</h2>

            @foreach($allUser as $key => $user )
                <section>

                    <div id="avatar"><img src="{{ UserHelper::getAvatar($user) }}" alt="{{$user->name}}"></div>
                    <div id="name">{{ UserHelper::getFullName($user) }}</div>
                    <div id="many">
                    {{ $user->pay }}
                     </div><!--many-->
                    <div id="status">
                        @if($key == 0)
                            <span>Первое место</span>
                        @elseif( $key == 1 )
                            <span>Второе место</span>
                        @elseif($key == 2)
                            <span>Третье место</span>
                        @endif
                    </div><!--status-->
                </section>
            @endforeach

            </div><!--col-->
      </div><!--row-->
    </div><!--container-->
@endsection
