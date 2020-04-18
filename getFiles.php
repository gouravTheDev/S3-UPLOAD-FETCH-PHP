<?php 
include 'config.php';
include 'S3.php';
try {
	if (defined('AWS_S3_URL')) {
	  S3::setAuth(AWS_S3_KEY, AWS_S3_SECRET);
	  S3::setRegion(AWS_S3_REGION);
	  
	  $objects = S3::getBucket(AWS_S3_BUCKET);  //GETTING BUCKET
	  // FOR CHECKING YOU CAN DO  ---> print_r($objects);
	  foreach ($objects as $object) {
		    foreach ($object as $key => $value) {
		    	echo "<strong>".$key."</strong>"." - ".$value ."<br>"; 
		    	echo "<strong>Path</strong>"." - https://".AWS_S3_BUCKET.".s3.amazonaws.com/".$object['name']."<br>"; 
		    }
		    echo "<hr>";
		}
	} else {
	 echo "Some Problem occured!";
	}
} catch (Exception $e) {
	echo "Error";
}
?>