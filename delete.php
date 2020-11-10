<?php
header('content-type:application/json');
$con=mysqli_connect("localhost","root","","demo_db");
$response=array();
if(isset($_GET['id'])){

	$id=$_GET['id'];
	$qry="delete from tbl_device where device_id='$id'";
	$ans=mysqli_query($con,$qry);
    if($ans>0){
        $response['code']=200;
    }else{
        $response['code']=201;
    }
	echo json_encode($response);
}
?>