<?php

spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.php';
});

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");


if ($_SERVER['REQUEST_METHOD'] != 'GET') {
    http_response_code(405);
    $response['message'] = 'Method not allowed. Alloed method: GET';
    echo json_encode($response);
    return;
}

$quoteDAO = new QuoteDAO();

if ($quoteDAO->getDB()->getError()) {
    http_response_code(500);
    $response['message'] = 'Internal server error';
    echo json_encode($response);
    return;
}

if (isset($_GET['domain'])) {
    $domain = $_GET['domain'];
    $quotes = $quoteDAO->getByDomain($domain);   
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $quotes = $quoteDAO->getById($id);
} else {
    $quotes = $quoteDAO->get();
}

if (empty($quotes)) {
    http_response_code(404);
} else {
    http_response_code(200);
}

echo json_encode($quotes);

