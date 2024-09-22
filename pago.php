<?php
 session_start();
$idDeuda = 'demo0021'; 
$siExiste= 'update';
$apiUrl = 'https://staging.adamspay.com/api/v1/debts';
$apiKey = 'ap-062a320d8fdac7170ff782ad';


// Hora DEBE ser en UTC!
$ahora = new DateTimeImmutable('now',new DateTimeZone('UTC'));
$expira = $ahora->add(new DateInterval('P2D'));
 
// Crear modelo de la deuda
$deuda = [
    'docId'=>$idDeuda,
    'label'=>'Cancun',
    'amount'=>['currency'=>'PYG','value'=>'2100000'],
    'validPeriod'=>[
        'start'=>$ahora->format(DateTime::ATOM),
        'end'=>$expira->format(DateTime::ATOM)
    ]
];
 
// Crear JSON para el post
$post = json_encode(['debt' => $deuda]);

// Hacer el POST
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $apiUrl,
    CURLOPT_HTTPHEADER => ['apikey: ' . $apiKey, 'Content-Type: application/json', 'x-if-exists' => $siExiste],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $post
]);


$response = curl_exec($curl);
if( $response ){
  $data = json_decode($response,true);
  $debt = isset($data['debt']) ? $data['debt'] : null;
  // Deuda es retornada en la propiedad "debt"
  $payUrl = isset($data['debt']) ? $data['debt']['payUrl'] : null;
  if( $payUrl ) {
    $_SESSION['payUrl'] = $payUrl;
    $_SESSION['mi_variable'] = false;
    header("Location: $payUrl");
    $_SESSION['debt_paid'] = isset($debt['payStatus']['status']) && $debt['payStatus']['status'] === 'paid';
    exit();
  } else {
    echo "No se pudo crear la deuda\n";
    print_r($data['meta']);
  }
 
}
else {
  echo 'curl_error: ',curl_error($curl);
}
curl_close($curl);
