@extends('adminlte::page')

@section('title', 'Previsão')



@section('content')
<html>
    <head>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        />
        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
        <script src="https://api4.windy.com/assets/libBoot.js"></script>
        <style>
            #windy {
                width: 100%;
                height: 700px;
            }
        </style>
    </head>
    <body>
        <div id="windy"></div>
        <script src="script.js"></script>
    </body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
const options = {
    // Required: API key
    key: 'lRNT94jmi8E0zTdy6ltWJSxBqCsPLjJ9', // REPLACE WITH YOUR KEY !!!

    // Put additional console output
    verbose: true,

    // Optional: Initial state of the map
    lat: -18.918366,
    lon: -48.266373,
    zoom: 5,
};

// Initialize Windy API
windyInit(options, windyAPI => {
    // windyAPI is ready, and contain 'map', 'store',
    // 'picker' and other usefull stuff

    const { map } = windyAPI;
    // .map is instance of Leaflet map

    L.popup()
        .setLatLng([-18.918366, -48.266373])
        .setContent('Av. Rondon Pacheco')
        .openOn(map);
});


</script>
@stop