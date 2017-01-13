
<section class="shapca">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-5">
                <div class="tc">
                    <div class="icon_main">
                        <div class="icon">
                            <img src="img/logo.png" alt="icon">
                        </div>
                    </div>
                    <div class="name">
                        <p class="mg_b_0">
                            <span class="family f16 Light">ИЛЬЯ КОЗЛОВ</span>
                        </p>
                        <p class="tc_db">
                            <span class="tc"><a href="{{URL::asset('/me')}}">редактировать</a></span>
                        </p>
                    </div>
                </div>
            </div> <!-- 1/3 col -->
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <div class="row">
                    <div class="vsego family f16 Light">
                        <a href="{{URL::asset('/users')}}">ВСЕГО: {{$global_user['count']}}</a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <div class="row">
                    <div class="novye family f16 Light">
                        НОВЫЕ: 11
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-2	col-lg-2">
                <div class="row">
                    <div class="cnop_vyh_div cnop_min">
                        <button class="cnop_vyh">
                            <span class="Normal"><a href="{{URL::asset('/logout')}}">ВЫХОД</a></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>