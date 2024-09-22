<?php
 session_start();
 $logFile = "webhook_log.txt";

$post = file_get_contents('php://input');
$secret = 'c1afbce7599458ec5e3119424e804e3d';

$hmac_expected = md5('adams' . $post . $secret);
$hmac_received = @$_SERVER['HTTP_X_ADAMS_NOTIFY_HASH'];

if ($hmac_expected !== $hmac_received) {
    die('Validación ha fallado'); 
}
$data = json_decode($post, true);

if ($data) {
    file_put_contents($logFile, date("Y-m-d H:I:S") . " - webhook recibido: " . json_encode($data) . PHP_EOL, FILE_APPEND);

    require_once "process_webhook.php";
    processWebhook($data);

   //verificar el estado de la deuda y almacenarlo 
    if (isset($data['debt'])) {
        $payStatus = $data['debt']['payStatus']['status'];
        $_SESSION['debt_paid'] = ($payStatus === 'paid');
    }

    http_response_code(200);
    echo json_encode(["message" => "webhook recibido correctamente"]) . "\n";


} else {
    http_response_code(400);
    echo json_encode(["message" => "Hubo un error al recibir el webhook"]) . "\n"; 
}

