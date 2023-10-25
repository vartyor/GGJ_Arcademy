<?php
  header("Cache-Control: max-age=10");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>MEGAZONECLOUD</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/carousel.css" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body style="padding-top: 0px">
    <?php include "header.php"; ?>
    <main>
      <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/GGJ_main1.png" class="d-block w-100" alt="main01">
            <div class="container">
              <div class="carousel-caption text-start">
                <h1>IT 전문 교육기관</h1>
                <p>정규 교육과정, 국비지원 과정, 기업 교육</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/GGJ_main2.png" class="d-block w-100" alt="main02">
            <div class="container">
              <div class="carousel-caption">
                <h1>AWS 트레이닝 파트너</h1>
                <p>AWS 공인 교육 진행</p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/GGJ_main3.jpg" class="d-block w-100" alt="main03">
            <div class="container">
              <div class="carousel-caption text-end">
                <h1>우수 교육기관 선정</h1>
                <p>고용 노동부 우수 교육 기관 선정</p>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img src="https://s3.amazonaws.com/img.ytf-forever.com/img/cloud.jpeg" width="250" height="180" style="padding-bottom: 10px">
            <h4><b>AWS Cloud</b></h4>
            <p>AWS 서비스가 클라우드 기반 솔루션에 어떻게 부합되는지에 대한 이해를 통해 AWS 클라우드를 최적화하는 방법을 배울 수 있습니다.</p>
            <p><a class="btn btn-secondary" href="#">수강 신청 &raquo;</a></p>
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4">
            <img src="https://s3.amazonaws.com/img.ytf-forever.com/img/hacking.jpeg" width="250" height="180" style="padding-bottom: 10px">
            <h4><b>모의 해킹</b></h4>
            <p> 개인정보 유출로 인해 정보를 효율적으로 보호할 수 있는 정보보호에 필요한 체계적인 관리와 기술을 학습하며 동시에 모의 해킹을 할 수 있는 보안의 고급 과정입니다.</p>
            <p><a class="btn btn-secondary" href="#">수강 신청 &raquo;</a></p>
          </div><!-- /.col-lg-4 -->

          <div class="col-lg-4">
            <img src="https://s3.amazonaws.com/img.ytf-forever.com/img/network.jpeg" width="250" height="180" style="padding-bottom: 10px">
            <h4><b>네트워크</b></h4>
            <p>네트워크 설치 및 운영능력 및 SOHO(Small Office / Home Office)시장에 필요한 초급 단계의 네트워킹 지식 습득에 관한 교육과정입니다.</p>
            <p><a class="btn btn-secondary" href="#">수강 신청 &raquo;</a></p>
          </div><!-- /.col-lg-4 -->

      <!-- FOOTER -->
      <footer class="container">
        <?php include "footer.php"; ?>
      </footer>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
