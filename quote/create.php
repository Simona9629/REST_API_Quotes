<?php

spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.php';
});

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    $response['message'] = 'Method not allowed. Alloed method: POST';
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

if (!isset($_POST['quote']) || !isset($_POST['domain'])) {
    http_response_code(400);
    $response['message'] = 'Incomplete data';
    echo json_encode($response);
    return;
}

$quote = new Quote($_POST['quote'], $_POST['domain']);
$id = $quoteDAO->add($quote);

if ($id) {
    $quote->setId($id);
    http_response_code(200);
    echo json_encode($quote);
} else {
    http_response_code(500);
    $response['message'] = 'Could not add the quote';
    echo json_encode($response);
}



