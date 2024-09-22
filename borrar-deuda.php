<?php
  session_start();
$idDeuda = 'demo0020';
$apiUrl = 'https://staging.adamspay.com/api/v1/debts/' . $idDeuda;
$apiKey = 'ap-062a320d8fdac7170ff782ad';
$notificarAlWebhook='true'; // Puede ser true,false o "now" si debe notificar de inmediato
 
$curl = curl_init();
 
curl_setopt_array($curl,[
 CURLOPT_URL => $apiUrl,
 CURLOPT_HTTPHEADER => ['apikey: '.$apiKey, 'x-should-notify'=>$notificarAlWebhook],
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_CUSTOMREQUEST=>'DELETE'
 ]);
 
$response = curl_exec($curl);
if( $response ){
  $data = json_decode($response,true);
 
  $debt = isset($data['debt']) ? $data['debt'] : null;
  if( $debt ){
    $_SESSION['mi_variable'] = true;
   
    header('Location: /acapuedo/index.php');
    exit();
  } else {
    echo "No se pudo eliminar la deuda\n";
    print_r($data['meta']);
  }
 
}
else {
  echo 'curl_error: ',curl_error($curl);
}
curl_close($curl);

