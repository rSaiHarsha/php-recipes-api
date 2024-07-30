<?php

class ResponseHelper
{
    public static function sendResponse($status, $data)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>
