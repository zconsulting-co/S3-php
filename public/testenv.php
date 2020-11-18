<?php
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable('../');
    $dotenv-> load();
    $s3_bucket = getenv('BUCKET_NAME');

    echo $s3_bucket;
?>