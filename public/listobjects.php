<?php
  include 'getawsclient.php';
  
  try {
    
    $objects = $s3->getIterator('ListObjects', array(
        'Bucket' => $BUCKET_NAME //bucket name
    ));
    
    // Console and browser
    echo "Keys retrieved!\n";
    // echo "Keys retrieved!<br />";
    foreach ($objects as $object) {
        echo $object['Key'] . "\n";
        // echo $object['Key'] . "<br />";
    }
  } catch (Exception $e) {
    die("Error: " . $e->getMessage());
  }
?>

