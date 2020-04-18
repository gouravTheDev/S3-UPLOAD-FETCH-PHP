<?php 
include 'config.php';
include 'S3.php';
if(isset($_POST["upload_files"])) {
	$tmpfile = $_FILES['upload_file']['tmp_name'];
	$file = $_FILES['upload_file']['name'];
	try {
		if (defined('AWS_S3_URL')) {
		  // UPLOAD TO S3
		  S3::putBucket(AWS_S3_BUCKET, S3::ACL_PUBLIC_READ);
		  S3::setAuth(AWS_S3_KEY, AWS_S3_SECRET);
		  S3::setRegion(AWS_S3_REGION);
		  if (S3::putObject(S3::inputFile($tmpfile), AWS_S3_BUCKET, 'DEMO-FILES/'.$file, S3::ACL_PUBLIC_READ)) {
		  	echo "Successfully Uploaded<br>";
		  	echo "File Path:- https://".AWS_S3_BUCKET.".s3.amazonaws.com/DEMO-FILES/".$file;
		  }
		} else {
		 echo "Failed";
		}
	} catch (Exception $e) {
		echo "Error";
	}
	
}

?>

<div class="container">
<h2>Upload File To AWS S3 using PHP</h2>
<br>
<a href="getFiles.php">See the files in your bucket</a>
<form method='post' enctype="multipart/form-data">
<h3>Upload a file</h3><br/>
<input type='file' name='upload_file'/>
<input type='submit' name="upload_files" value='Upload'/>
</form>

</div>