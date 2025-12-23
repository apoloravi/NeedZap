<?php
/**
 * NeedZap Proxy - PlaySMS GET Compatible
 * -------------------------------------
 * Integração MK-Auth / PlaySMS → NeedZap (Whazing)
 *
 * Desenvolvido por: Apolo Ravi
 * Site: https://needzap.net
 * WhatsApp: +55 22 99613-5700
 */

require __DIR__ . '/config.php';

// ================================
// INFO PAGE
// ================================
if (!isset($_GET['to']) && !isset($_GET['p_to'])) {
    header('Content-Type: text/html; charset=utf-8');
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>NeedZap API Proxy</title>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background: #0f172a;
                color: #e5e7eb;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
            }
            .box {
                background: #020617;
                padding: 32px 42px;
                border-radius: 12px;
                text-align: center;
                box-shadow: 0 10px 40px rgba(0,0,0,.45);
                max-width: 420px;
            }
            h1 {
                color: #38bdf8;
                margin-bottom: 12px;
            }
            p {
                margin: 6px 0;
            }
            a {
                color: #22d3ee;
                text-decoration: none;
            }
            .footer {
                margin-top: 18px;
                font-size: 14px;
                opacity: .85;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <h1>NeedZap API Proxy</h1>
            <p><strong>Site:</strong> <a href="https://needzap.net" target="_blank">https://needzap.net</a></p>
            <p><strong>WhatsApp:</strong> +55 22 99613-5700</p>
            <div class="footer">
                Desenvolvido por <strong>Apolo Ravi</strong>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// ================================
// PLAY SMS / MK-AUTH PARAMS
// ================================
$to  = $_GET['p_to']  ?? $_GET['to']  ?? null;
$msg = $_GET['p_msg'] ?? $_GET['msg'] ?? null;

if (!$to || !$msg) {
    http_response_code(400);
    echo 'ERR Missing parameters';
    exit;
}

// ================================
// SEND TO NEEDZAP
// ================================
$url = NEEDZAP_API_URL . '/' . NEEDZAP_EXTERNAL_KEY . '/send-message';

$data = [
    'number'  => $to,
    'message' => urldecode($msg)
];

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        'Authorization: Bearer ' . NEEDZAP_TOKEN,
        'Content-Type: application/json'
    ],
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_TIMEOUT => 15
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// ================================
// RETURN TO PLAYSMS
// ================================
if ($httpCode >= 200 && $httpCode < 300) {
    echo 'OK';
} else {
    echo 'ERR ' . $response;
}
