<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Response;

class ApiController extends Controller
{
    protected $statusCode = 200;

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function respondNotFound($message = 'Not Found')
    {
        return $this
            ->setStatusCode(404)
            ->respondWithError($message);
    }

    public function respondWithError($message)
    {
        return $this->respond([
            'success' => false,
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    public function respondOk($data){
        return $this->respond([
            'success' => true,
            'data' => $data
        ]);
    }

    public function respond($data, $headers = []){
        return Response::json($data, $this->getStatusCode(), $headers);
    }
}