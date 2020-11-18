<?php
	include 'getawsclient.php';
        include 'connectiondb.php';

	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	$keyName = 'test_example/' . basename($_FILES["fileToUpload"]['name']);
	$pathInS3 = 'https://s3.' . $REGION . '.amazonaws.com/' . $BUCKET_NAME . '/' . $keyName;

	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["fileToUpload"]['tmp_name'];

		$s3->putObject(
			array(
				'Bucket'=>$BUCKET_NAME,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);

	} catch (Exception $e) {
		die("Error: " . $e->getMessage());
	}
    
    // Save file to Files Table - TODO  

    // Create access code, lo ideal es que esto vaya cambiando aleatoriamente
    //$ACCESS_CODE = '1234570';
    $ACCESS_CODE = rand();
    
    $conn = OpenCon();
    
    $sql = "INSERT INTO s3Files(s3FilePath, accessCode) VALUES ('$keyName', '$ACCESS_CODE')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
   
    CloseCon($conn);
    echo 'Done';

	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.
?>
