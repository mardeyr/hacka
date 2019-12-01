@extends('adminlte::page')
@section('title', 'Predição')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<div class="container">
    <h1 class="text-center">Camera 01 </h1>

    <form method="POST" action="">
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br />
                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Fotos </div>
            </div>
            <div class="col-md-12 text-center">
                <br />
                <button class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>



@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!-- Configure a few settings and attach camera -->
<script>
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');
var teste ; 
    function take_snapshot() {
  Webcam.snap(function(data_uri) {
    console.log( data_uri ) ;
    
      
     var httpPost = new XMLHttpRequest() ;
        path = "http://178.128.156.247/api/upload"  + "01" ;
        data = JSON.stringify({image: data_uri});
    httpPost.onreadystatechange = function(err) {
            if (httpPost.readyState == 4 && httpPost.status == 200){
                console.log(httpPost.responseText);
            } else {
                console.log(err);
            }
        }

    $(".image-tag").val(data_uri)  ; 
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
          








            });
      
    }
setInterval(function() {
        take_snapshot();
    }, 20000);



    var sendBase64ToServer = function(name, base64){
    var httpPost = new XMLHttpRequest(),
        path = "http://178.128.156.247/api/upload"  + name,
        data = JSON.stringify({image: base64});
    httpPost.onreadystatechange = function(err) {
            if (httpPost.readyState == 4 && httpPost.status == 200){
                console.log(httpPost.responseText);
            } else {
                console.log(err);
            }
        };
    // Set the content type of the request to json since that's what's being sent
    httpPost.setHeader('Content-Type', 'application/json');
    httpPost.open("POST", path, true);
    httpPost.send(data);
};


</script>
@stop