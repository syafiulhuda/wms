<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>WMS - Sunan Kalijaga</title>
      <meta content="" name="description" />
      <meta content="" name="keywords" />
      
      <!-- Favicons -->
      <link href="assets/img/logo.png" rel="icon" />
      <link href="assets/img/logo.png" rel="apple-touch-icon" />
    
      <!-- scripts -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
      <script type="text/javascript" src="https://unpkg.com/mdbootstrap@4.20.0/js/mdb.min.js"></script>
      <script type="text/javascript" src="assets/js/jquery-latest.js"></script>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    
    <!-- to php -->
    <script type="text/javascript">
      var refreshid = setInterval(function () {
        $("#suhu_kelembapan").load("database/suhu_kelembapan.php");
      }, 3000);
    </script>

    <script type="text/javascript">
      var refreshid = setInterval(function () {
        $("#curah_hujan").load("database/curah_hujan.php");
      }, 3000);
    </script>

    <script type="text/javascript">
      var refreshid = setInterval(function () {
        $("#kecepatan_angin").load("database/kecepatan_angin.php");
      }, 3000);
    </script>
    
    <script type="text/javascript">
    var refreshid = setInterval(function() {
      $("#waktu").load("database/waktu.php");
    });
    </script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
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
          <div class="list-item">
            <a href="geospatial.php">
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
      <div class="dht22" style="margin-bottom: 2rem;">
        <div id="suhu_kelembapan">DHT22</div>
      </div>
      <div class="anemometer" style="margin-bottom: 2rem;">
        <div id="kecepatan_angin">ANEMOMETER</div>
      </div>
      <div class="ombrometer">
        <div id="curah_hujan">OMBROMETER</div>
      </div>
    </div>
    
    
    <!-- js -->
    <script src="assets/js/package/dist/sweetalert2.all.min.js"></script>
    <!-- js -->
    
    <?php
        // konek database
        $konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");
    
        // Query untuk mengambil 10 data terakhir dengan suhu di atas 33
        $query = "SELECT suhu FROM tabel_sensor WHERE suhu > 33 ORDER BY id DESC LIMIT 10";
        $result = mysqli_query($konek, $query);
    
        // Menghitung jumlah baris hasil query
        $numRows = mysqli_num_rows($result);
    
        // Memeriksa apakah ada data yang memenuhi kondisi
        if ($numRows > 0) {
            echo '<script>
                // Menampilkan notifikasi SweetAlert
                Swal.fire({
                    title: "Peringatan!",
                    html: "Terdapat peningkatan suhu diatas 33&deg; pada beberapa waktu terakhir.",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                    customClass: {
                        container: "custom-swal-container",
                    },
                });
    
                // Menambahkan margin-left pada elemen dengan class "custom-swal-container"
                var swalContainer = document.querySelector(".custom-swal-container");
                swalContainer.style.marginLeft = "15.8rem";
            </script>';
        }
    ?>

    

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
