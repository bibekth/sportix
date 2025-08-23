<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse(mixed $data = null, $message = 'success', $code = 200)
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        if ($data !== null) {
            $response['data'] = $data;
        }

        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function errorResponse($message, $code)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error401()
    {
        $response = [
            'success' => false,
            'message' => 'User not authorized.',
        ];
        return response()->json($response, 401);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error402()
    {
        $response = [
            'success' => false,
            'message' => 'Payment required. Please make a payment first',
        ];
        return response()->json($response, 402);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error403()
    {
        $response = [
            'success' => false,
            'message' => 'User is forbidden for this action.',
        ];
        return response()->json($response, 403);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error404()
    {
        $response = [
            'success' => false,
            'message' => 'Data not found.',
        ];
        return response()->json($response, 404);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error500(mixed $errorMessages, $code = 500)
    {
        $response = [
            'success' => false,
            'message' => $errorMessages,
        ];
        return response()->json($response, $code);
    }
}
