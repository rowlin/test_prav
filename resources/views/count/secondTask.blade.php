@extends('layouts.app')

@section('headData')
<style>
    .thumbnail{
        height: 100px;
        margin: 10px;
    }

</style>

@endsection

@section('wrapper')
<div class="container-fluid">
    <div class="row">
           <div class="col-md-8 col-md-offset-2">
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
                    <h2>Задание №2</h2>
                    <form  action="{{ url('first') }}" enctype="multipart/form-data" method="post" >

                       <div class="form-inline">



                            <div class="form-group">
                             <label for="username"></label>
                                <input class="form-control" type="text" name="username">
                            </div>

                           <div class="form-group">
                               <label for="username">Введите имя :</label>
                               <input class="form-control" type="text" name="username">
                           </div>

                           <div class="form-group">
                               <label for="username">Введите имя :</label>
                               <input class="form-control" type="text" name="username">
                           </div>

                           <div class="form-group">
                               <label for="username">Введите имя :</label>
                               <input class="form-control" type="text" name="username">
                           </div>
                        </div><!--form-inline-->

                        <article>
                        <label for="files">Загрузите 4 файла: </label>
                        <input id="files" type="file" multiple/>
                        <output id="result" />
                        </article>

                    </form>
              </section>
        </div>
    </div>
</div>
<!-- JavaScripts -->
<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>
<script>
    window.onload = function(){

        if(window.File && window.FileList && window.FileReader)
        {
            var filesInput = document.getElementById("files");
            filesInput.addEventListener("change", function(event){
                var files = event.target.files; //FileList object
                var output = document.getElementById("result");
                for(var i = 0; i< files.length; i++)
                {
                    var file = files[i];
                    //Only pics
                    if(!file.type.match('image'))
                        continue;
                    var picReader = new FileReader();
                    picReader.addEventListener("load",function(event){
                        var picFile = event.target;
                        var div = document.createElement("div");
                        div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
                                "title='" + picFile.name + "'/>";
                        output.insertBefore(div,null);
                    });

                    //Read the image
                    picReader.readAsDataURL(file);
                }
            });
        }
        else
        {
            console.log("Your browser does not support File API");
        }
    }



</script>

@endsection