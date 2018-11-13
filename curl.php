<?php

$auth = "davidruizsanchez@gmail.com:Rjy8qt0jkj3goXED";


$conex = curl_init(); 
//step2
curl_setopt($conex,CURLOPT_URL,"https://api.dataforseo.com/v2/rnk_tasks_post");
curl_setopt($conex, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($conex, CURLOPT_RETURNTRANSFER, true);
curl_setopt($conex, CURLOPT_HEADER, false);
curl_setopt($conex, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($conex, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($conex, CURLOPT_POST, 1);
curl_setopt($conex, CURLOPT_POSTFIELDS,'{"data":{"100500":{"priority":1,"site":"ranksonic.com","se_name":"google.co.uk","se_language":"English","loc_name_canonical":"London,England,United Kingdom","key":"online rank tracker"}}}');
curl_setopt($conex, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Access-Control-Allow-Origin: *','Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, PATCH, DELETE','Access-Control-Allow-Credentials: true','Access-Control-Allow-Headers: Authorization, Content-Type, x-xsrf-token, x_csrftoken, Cache-Control, X-Requested-With')); 
curl_setopt($conex, CURLOPT_USERPWD, $auth);

//step3
$result=curl_exec($conex);
//step4
curl_close($conex);

$result = json_decode($result);//hacer print_r para comprobar ruta a dato que necesitamos

$task_id = $result->results->{'100500'}->task_id;
echo $task_id;



//AHORA POST

$conex = curl_init(); 
//step2
curl_setopt($conex,CURLOPT_URL,"https://api.dataforseo.com/v2/rnk_tasks_get/".$task_id);
curl_setopt($conex, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($conex, CURLOPT_RETURNTRANSFER, true);
curl_setopt($conex, CURLOPT_HEADER, false);
curl_setopt($conex, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($conex, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($conex, CURLOPT_USERPWD, $auth);

//step3
$result=curl_exec($conex);
//step4
curl_close($conex);

echo $result;
?>