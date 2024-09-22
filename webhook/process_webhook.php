<?php

function processWebhook($data){
    if (isset($data["notify"]["type"])) {
        $type = $data["notify"]["type"];

        // gestionar notificaciones de estado de deuda
        if ($type === "debtStatus") {
            $debt = $data["debt"];
            $docId = $debt["docId"];
            $payStatus = $debt["payStatus"]["status"];
            $objStatus = $debt["objStatus"]["status"];

            // registra la actualizacion del estado
            file_put_contents(__DIR__ . "/webhook_log.txt", "Procesando deuda: $docId, estado de pago: $payStatus, estado de objeto: $objStatus" . PHP_EOL, FILE_APPEND);

        } 
    }
}
