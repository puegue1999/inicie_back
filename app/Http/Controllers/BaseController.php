<?php

namespace App\Http\Controllers;

use App\Http\Controller\Controllers;

class BaseController extends Controller
{
    /**
     * Retorno caso a chamada seja sucesso;
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];
        return response()->json($response, 200);
    }

    /**
     * Retorno caso a chamada seja error;
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
