<?php
$secretKey = trim('live_sk_yZqmkKeP8gPqQydGZ0jk3bQRxB9l');

// Toss가 보낸 Signature
$receivedSignature = $_SERVER['HTTP_TOSS_SIGNATURE'] ?? '';

// Toss의 원본 JSON 바디
$body = file_get_contents('php://input');

// 검증용 시그니처 생성
$generatedSignature = base64_encode(hash_hmac('sha256', $body, $secretKey, true));

// 비교
if ($receivedSignature !== $generatedSignature) {
    http_response_code(403);
    echo 'Invalid Signature';
    exit;
}