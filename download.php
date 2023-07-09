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
    <link rel="stylesheet" type="text/css" href="assets/css/download.css" />
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
          <div class="list-item active active">
            <a href="download.php" class="active">
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
      <div class="download-page">
        <h1>Download Page</h1>
        <img src="assets/img/download-ilustration.svg" alt="#" />
        <p>
          Please click the button below to start the download.
        </p>
        <button id="download-data" class="download-btn">
          Download Now
        </button>
      </div>
    </div>
    
    <script>
      const tombol = document.querySelector("#download-data");
      tombol.addEventListener("click", function () {
        Swal.fire({
          title: "Are you sure?",
          text: "Data yang didownload akan berformat csv",
          icon: "info",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, download it!",
          customClass: {
            container: "custom-swal-container",
          },
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: "Downloaded!",
              text: "Your file has been downloaded.",
              icon: "success",
              customClass: {
                container: "custom-swal-container",
              },
            }).then(() => {
              // Membuat request ke halaman download.php
              const xhr = new XMLHttpRequest();
              xhr.open("GET", "database/download.php");
              xhr.responseType = "blob";
              xhr.onload = function () {
                if (xhr.status === 200) {
                  // Membuat objek URL dari response
                  const blobUrl = URL.createObjectURL(xhr.response);
                  
                  // Membuat elemen <a> untuk melakukan download
                  const link = document.createElement("a");
                  link.href = blobUrl;
                  link.download = "data_sensor.csv";
                  
                  // Simulasi klik pada elemen <a> untuk memulai download
                  link.click();
                  
                  // Merevoke objek URL setelah selesai download
                  URL.revokeObjectURL(blobUrl);
                }
              };
              xhr.send();
            });
          }
        });
      });
    </script>

    
    <!-- JS -->
    <script src="assets/js/package/dist/sweetalert2.all.min.js"></script>
    <!-- Js -->

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
