<?php

require('visitor_connect.php');



$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($ip);
$cur_page = $_SERVER['REQUEST_URI'];
$pre_page = "";
if($_SERVER['HTTP_REFERER']){
    $pre_page = $_SERVER['HTTP_REFERER'];
}

$xff = $_SERVER['HTTP_X_FORWARDED_FOR'];
if($_SERVER['HTTP_X_FORWARDED_FOR']){
    $pre_page = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
$xfflist = $xff.explode(",",$xff);
$xffjson = json_encode($xff);

$hostname = mysqli_real_escape_string($conn, $hostname);
$cur_page = mysqli_real_escape_string($conn, $cur_page);
$pre_page = mysqli_real_escape_string($conn, $pre_page);
$xffjson = mysqli_real_escape_string($conn, $xffjson);

if (!$conn->query("INSERT INTO ". $database.".".$tablename ." (ip_address, hostname, cur_url, pre_url, xff_headers) VALUES ( '".$ip."' , '".$hostname."' , '".$cur_page."' , '".$pre_page."' , '".$xffjson."')") === TRUE) {
    echo "Error:". $conn->error;
}
//$stmt = $conn->prepare("INSERT INTO ? (ip_address, hostname, cur_url, pre_url, xff_headers) VALUES (?,?,?,?,?)");
//$stmt->bind_param("ssssss", $tablename, $ip, $hostname, $cur_page, $pre_page, $xffjson);
//$stmt->execute();

//$stmt->close();
$conn->close();
?>