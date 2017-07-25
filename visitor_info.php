<?php

require('visitor_connect.php');

$ip = $hostname = "";

$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($ip);
$cur_page ="http://" . $_SERVER['HOST_URL'] . $_SERVER['REQUEST_URI'];
$pre_page = $_SERVER['HTTP_REFERER'];

$xff = $_SERVER['HTTP_X_FORWARDED_FOR'];
$xfflist = $xff.explode(",",$xff);
$xffjson = json_encode($xff);

$ip = mysqli_real_escape_string($conn, $ip);
$hostname = mysqli_real_escape_string($conn, $hostname);
$cur_page = mysqli_real_escape_string($conn, $cur_page);
$pre_page = mysqli_real_escape_string($conn, $pre_page);
$xffjson = mysqli_real_escape_string($conn, $xffjson);

if (!$conn->query("INSERT INTO ". $database.".".$tablename ." (ip_address, hostname, cur_url, pre_url, xff_headers) VALUES ( ".$ip." , ".$hostname." , ".$cur_page." , ".$pre_page." , ".$xffjson.")") === TRUE) {
    echo "Error:". $conn->error;
}
//$stmt = $conn->prepare("INSERT INTO ? (ip_address, hostname, cur_url, pre_url, xff_headers) VALUES (?,?,?,?,?)");
//$stmt->bind_param("ssssss", $tablename, $ip, $hostname, $cur_page, $pre_page, $xffjson);
//$stmt->execute();

//$stmt->close();
$conn->close();
?>