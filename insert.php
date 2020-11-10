<?php
header('content-type:application/json');
$con=mysqli_connect("localhost","root","","demo_db");
$response=array();
$data=array();
$token=$_GET['token'];
$name=$_GET['device_name'];

$qry="insert tbl_device (token,device_name,status) values ('$token','$name','on')";
$ans=mysqli_query($con,$qry);
if($ans>0){
    $response['code']=200;
}else{
    $response['code']=201;
}
echo json_encode($response);

?>