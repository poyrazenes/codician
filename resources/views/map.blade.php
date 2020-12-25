<!doctype html>
<html lang="tr">
<head>
    <title>Map API</title>
    <style type="text/css"> html, body, #mapFrame { width: 100%; height: 100%; margin: 0; padding: 0; } </style>
    <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
</head>
<body>

<div id="harita" style="width:100%; height:100%">
    <iframe id="mapFrame" src="http://sehirharitasi.ibb.gov.tr/"></iframe>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.js"></script>
<script>
    var ibbMAP = new SehirHaritasiAPI({mapFrame:"mapFrame",apiKey:"ac952924063b4c288884a127ad532b00"}, function(){
        ibbMAP.Panorama.Open({
            lat: {{ $address->latitude }},
            lon: {{ $address->longitude }},
            angle: 10
        });
    });
</script>
</body>
</html>
