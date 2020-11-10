<?php
header('content-type:application/json');
define('API_ACCESS_KEY','AAAAhbHZ-ec:APA91bEXfkm-3Yw69wPQtTarE53gCbrqlBVhhK5Ye_yQi1iZkGIDZYGGjKpSs0lQvt4uptO6qa2pzHsMLMiUz98Lq02d46vMKrL0YTMCTdik1mKLDLf5aGbWnY10cpB3zwFSZzQqTGPE');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
 
$token=$_GET['token'];
$msg=$_GET['msg'];

//dMnzyZSpMyM:APA91bEYOqObOlRIL_c23itYNhqk0YZI1aTrgjhEx6QUKQXLF3SlgrQi2rZSbY7S98kIQ6-EpasUJayMrslAUDMs0PYyFSCao44AX617Bkj2hLG5tIuc_Fs9SII1pSeHBPcZoM6Zc4b5

//dCRdgqtlItc:APA91bGvGAlew3LMVnJCdyGY4S7JieFKrCYMwmkMvhv7VKvsENkjX7Sj3Lp0HIer2AdGX1zvg7NkTaKk0Mpya09WmOW8dbcpTFA8vMoxnV4Q5u67QqbIf973o90q6hIRdYgZWLCppurD
    $notification = [
            'title' =>'title',
            'body' => $msg,
            'icon' =>'myIcon', 
            'sound' => 'mySound'
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            
            'data' => $extraNotificationData
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        echo json_encode($result);
        
?>