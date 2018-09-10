<?php

namespace App\Traits;

trait Responsable
{
    /**
     * Format the response as API standart.
     * @param mixed $data
     * @param mixed $status
     * @param string $message
     * @param mixed $errors
     * @return Array
     */
    public function response($data, $status = 200, $message = NULL, $errors = NULL)
    {
        return [
            'status' => $status,
            'message' => $message,
            'errors' => $errors,
            'data' => $data,
        ];
    }
}
