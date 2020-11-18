<?php
	// I will be using composer to install the needed AWS packages.
	// The PHP SDK:
	// https://github.com/aws/aws-sdk-php
	// https://packagist.org/packages/aws/aws-sdk-php 
	//
	// Run:$ composer require aws/aws-sdk-php
	// Run:$ composer require vlucas/phpdotenv
	
        require '../vendor/autoload.php';
    
	use Aws\S3\S3Client;
        use Aws\S3\Exception\S3Exception;
	
	// Load environment variables
	$dotenv = Dotenv\Dotenv::createImmutable('../');
	$dotenv-> load();

	// AWS Info
	$IAM_KEY = getenv('IAM_KEY');
	$IAM_SECRET = getenv('IAM_SECRET');
        $BUCKET_NAME = getenv('BUCKET_NAME');
        $REGION = getenv('REGION');

	// Connect to AWS
	try {
		// You may need to change the region. It will say in the URL when the bucket is open
		// and on creation.
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => $REGION
			)
		);
	} catch (Exception $e) {
		// We use a die, so if this fails. It stops here. Typically this is a REST call so this would
		// return a json object.
		die("Error: " . $e->getMessage());
    }

    // echo "Done\n";

?>
