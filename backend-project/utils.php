<?php
function respond($data, $result = 'success', $message = 'Request Successfull')
{
    echo json_encode([
        'result' => $result,
        'message' => $message,
        'data' => $data
    ]);
}