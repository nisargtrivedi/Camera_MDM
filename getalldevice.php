<?php
header('content-type:application/json');
$con=mysqli_connect("localhost","root","","demo_db");
$response=array();
$data=array();
$qry="select * from tbl_device";
$ans=mysqli_query($con,$qry);
if(mysqli_num_rows($ans)>0){
    foreach($ans as $row):
        $data['device_id']=$row['device_id'];
        $data['token']=$row['token'];
        $data['device_name']=$row['device_name'];
        $data['status']=$row['status'];
        $response['device'][]=$data;
    endforeach;
    $response['code']=200;
}else{
    $response['device'][]=$data;
    $response['code']=201;
}
echo json_encode($response);

?>