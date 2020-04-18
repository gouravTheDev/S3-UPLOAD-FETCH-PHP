<?php

define('AWS_S3_KEY', 'YOUR-KEY');
define('AWS_S3_SECRET', 'YOUR-SECRET');
define('AWS_S3_REGION', 'ap-south-1'); //YOUR REGION MAY BE DIFFERENT, YOU CAN CHECK https://docs.aws.amazon.com/AmazonRDS/latest/UserGuide/Concepts.RegionsAndAvailabilityZones.html
define('AWS_S3_BUCKET', 'DEMO-BUCKET');
define('AWS_S3_URL', 'http://s3.'.AWS_S3_REGION.'.amazonaws.com/'.AWS_S3_BUCKET.'/');

?>
