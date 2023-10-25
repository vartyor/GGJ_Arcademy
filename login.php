<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];

   require_once "dbconn.php";
   $sql = "select * from members where id='$id'and pass='$pass'";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   $az = file_get_contents('http://169.254.169.254/latest/meta-data/placement/availability-zone');
   $region = substr($az, 0, -1);

   require_once 'aws-autoloader.php';
   use Aws\DynamoDb\DynamoDbClient;
   use Aws\DynamoDb\SessionHandler;

   $dynamoDb = new DynamoDbClient([
       'region' => $region,
       'version' => 'latest'
   ]);
   $sessionHandler = SessionHandler::fromClient($dynamoDb, [
       'table_name'                    => 'sessions',
       'hash_key'                      => 'id',
       'data_attribute'                => 'data',
       'data_attribute_type'           => 'string',
       'session_lifetime'              => 3600,
       'session_lifetime_attribute'    => 'expires',
   ]);
   $sessionHandler->register();


   if(!$num_match)
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        mysqli_close($con);

        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["name"];
        $_SESSION["userlevel"] = $row["level"];
        $_SESSION["userpoint"] = $row["point"];

        echo("
          <script>
            location.href = 'index.php';
          </script>
        ");
     }
?>
