<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- scripts -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script type="text/javascript" src="https://unpkg.com/mdbootstrap@4.20.0/js/mdb.min.js"></script>
      <script type="text/javascript" src="assets/js/jquery-latest.js"></script>
    
    <!-- leaflet maps -->  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <title>WMS - Sunan Kalijaga</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
      
    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon" />
    <link href="assets/img/logo.png" rel="apple-touch-icon" />
    
    <script type="text/javascript">
    var refreshid = setInterval(function() {
      $("#waktu").load("database/waktu.php");
    });
    </script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/geospatial.css" />
  </head>
  <body>
    <div class="sidebar">
      <div class="header">
        <div class="ilustration">
          <span class="description-header">Weather Monitoring System</span>
          <a href="homePage.php" onClick="location.reload();">
            <img
              src="assets/img/logo.png"
              alt="logo"
              style="height: 85px; width: 85px; margin-top: 1rem"
            />
          </a>
          <span class="description-header">UIN Sunan Kalijaga</span>
        </div>

        <div class="main">
          <div class="list-item">
            <a href="summary.php">
              <img src="assets/img/history.svg" alt="" class="icon" />
              <span class="description">History</span>
            </a>
          </div>
          <div class="list-item">
            <a href="download.php">
              <img
                src="assets/img/download.svg"
                alt=""
                class="icon"
                style="
                  width: 16px;
                  height: 16px;
                  color: #ffffff;
                  background-color: #ffffff;
                "
              />
              <span class="description">Download</span>
            </a>
          </div>
          <div class="list-item active">
            <a href="geospatial.php" class="active">
              <img src="assets/img/explore.svg" alt="" class="icon" />
              <span class="description">Geospatial</span>
            </a>
          </div>
          <div>
            <div
              class="description"
              id="waktu"
              style="font-size: 1.2rem; font-weight: bold; color: #ffffff;"
            >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-content">
    <div class="container">
      <div id="map" style="height: 500px;"></div>
    </div>
  </div>

  <script>
    // Inisialisasi peta dengan koordinat pusat dan zoom level
    var map = L.map('map').setView([-7.784540409990724, 110.3943764648263], 15.5);

    // Tambahkan tile layer sebagai latar peta (contoh menggunakan OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: 'Powered by &copy; OpenStreetMap',
      maxZoom: 22,
    }).addTo(map);

    // Membuat ikon marker berwarna merah
    var redIcon = L.icon({
      iconUrl: 'assets/img/location.png',
      iconSize: [45, 45],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });

    // koordinat sistem
    var marker1 = L.marker([-7.78573, 110.393983], {
        icon: redIcon
      }).addTo(map)
      .bindPopup("<b>Lokasi:</b> Laboratorium Terpadu UIN Sunan Kalijaga <br> <b>Koordinat:</b> -7.78573, 110.393983 <br> <a href='https://goo.gl/maps/7DnmDHDCt2AZVo5c8' target='_blank'>Buka di Maps</a>", {
        maxWidth: 300,
        // offset: [-100, 0]
      });

    var marker2 = L.marker([-7.783819, 110.395623]).addTo(map)
      .bindPopup("<b>Lokasi:</b> Perpustakaan UIN Sunan Kalijaga<br><b>Koordinat:</b> -7.783819, 110.395623 <br> <a href='https://goo.gl/maps/aBWx1hRTkTkaJbic8' target='_blank'>Buka di Maps</a>", {
        maxWidth: 300,
        // offset: [-100, 0]
      });

    var marker3 = L.marker([-7.784989600487916, 110.3963161665405]).addTo(map)
      .bindPopup("<b>Lokasi:</b> Student Center UIN Sunan Kalijaga<br><b>Koordinat:</b> -7.784989600487916, 110.3963161665405 <br> <a href='https://goo.gl/maps/QGJ959syofWXGJkq6' target='_blank'>Buka di Maps</a>", {
        maxWidth: 300,
        // offset: [-100, 0]
      });


    var popup = L.popup();

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
    }
    map.on('click', onMapClick);
  </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
</html>
