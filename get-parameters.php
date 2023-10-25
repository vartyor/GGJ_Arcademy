<?php
  require_once 'aws-autoloader.php';

  $az = file_get_contents('http://169.254.169.254/latest/meta-data/placement/availability-zone');
  $region = substr($az, 0, -1);

  $ssm_client = new Aws\Ssm\SsmClient([
    'version' => 'latest',
    'region'  => $region
  ]);

  try {
    # Retrieve settings from Parameter Store
    $result = $ssm_client->GetParametersByPath(['Path' => '/inventory-app/', 'WithDecryption' => true]);

    # Extract individual parameters
    foreach($result['Parameters'] as $p) {
        $values[$p['Name']] = $p['Value'];
    }

    $db_host = $values['/inventory-app/endpoint'];
    $db_user = $values['/inventory-app/username'];
    $db_pass = $values['/inventory-app/password'];
    $db_name = $values['/inventory-app/db'];
  }
  catch (Exception $e) {
    $db_host = '';
    $db_user = '';
    $db_pass = '';
    $db_name = '';
  }
#error_log('Settings are: ' . $db_host. " / " . $db_user . " / " . $db_pass . " / " . $db_name);
?>
