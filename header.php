<?php
    require_once 'aws-autoloader.php';

    use Aws\DynamoDb\DynamoDbClient;
    use Aws\DynamoDb\SessionHandler;

    $az = file_get_contents('http://169.254.169.254/latest/meta-data/placement/availability-zone');
    $region = substr($az, 0, -1);

    $dynamoDb = new DynamoDbClient([
        'region' => $region,
        'version' => 'latest'
    ]);
    $sessionHandler = SessionHandler::fromClient($dynamoDb, [
        'table_name'                    => 'sessions'
    ]);
    $sessionHandler->register();

    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./css/headers.css" rel="stylesheet">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </head>
  <body>
    <main>
      <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="/index.php" class="nav-link px-2 text-secondary">GGJAcademy</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-2 text-white" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">교육과정 소개</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                  <li><a class="dropdown-item" href="#">정규교육 과정</a></li>
                  <li><a class="dropdown-item" href="#">국비지원 과정</a></li>
                  <li><a class="dropdown-item" href="#">기업교육</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle px-2 text-white" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">지점 소개</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                  <li><a class="dropdown-item" href="#">의정부 교육장</a></li>
                  <li><a class="dropdown-item" href="#">분당 교육장</a></li>
                  <li><a class="dropdown-item" href="#">일산 교육장</a></li>
                </ul>
              </li>
              <li><a href="#" class="nav-link px-2 text-white">수강신청</a></li>
              <li><a href="/board/board_list.php" class="nav-link px-2 text-white">게시판</a></li>
            </ul>

            <?php
                if(!$userid) {
            ?>
            <div class="text-end">
              <button type="button" onclick="location.href='/login_form.php';" class="btn btn-outline-light me-2">Login</button>
              <button type="button" onclick="location.href='/member/member_form.php';" class="btn btn-primary">Sign-up</button>
            </div>
            <?php
                } else {
                    $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
                    ?>
                    <li style="padding-right: 20px"><?=$logged?> </li>
                    <div class="dropdown text-end">
                      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
			<img src="./img/member.png" alt="mdo" width="32" height="32" class="rounded-circle">
                      </a>
                      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project</a></li>
                        <li><a class="dropdown-item" href="/member/member_modify_form.php">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/logout.php">Sign out</a></li>
                      </ul>
                    </div>
          <?php
              }
          ?>
          </div>
        </div>
      </header>
    </main>

    <script src="./js/bootstrap.bundle.min.js"></script>
  </body>
</html>
