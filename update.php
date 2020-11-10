<?php
header('content-type:application/json');
$con=mysqli_connect("localhost","root","","demo_db");
$response=array();
$data=array();
$token=$_GET['token'];
$msg=$_GET['msg'];

$qry="update tbl_device set status='$msg' where device_id='$token'";
$ans=mysqli_query($con,$qry);
if($ans>0){
    $response['code']=200;
}else{
    $response['code']=201;
}
echo json_encode($response);

?>