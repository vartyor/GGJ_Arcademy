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
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userlevel"]);
  unset($_SESSION["userpoint"]);

  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
