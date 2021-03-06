<?php

// file:   JsonResponderTrait.php
// date:   2016-01-12
// author: Michael Leßnau <michael.lessnau@gmail.com>

namespace Jra\Controller\Traits;

use Cake\Utility\Hash;

/**
 * Responder trait for controllers.
 *
 * @author Michael Leßnau <michael.lessnau@gmail.com>
 */
trait JsonResponderTrait
{
    /**
     * Responds with JSON formatted data.
     *
     * @param mixed $data
     * @param array $options Valid keys are 'code' and 'message'.
     *
     * @return Cake\Network\Response
     */
    public function respondWithJson($data, array $options = [])
    {
        $reservedKeys = ['code', 'status', 'message', 'data', 'errors'];

        $code = Hash::get($options, 'code', 200);
        $status = ($code < 400) ? 'success' : 'failure';
        $message = Hash::get($options, 'message', null);
        $dataField = ($status === 'success') ? 'data' : 'errors';

        $json = json_encode(
            array_merge(
                [
                    'status' => $status,
                    'code' => $code,
                    $dataField => $data,
                    'message' => $message
                ],
                array_diff_key($options, array_flip($reservedKeys))
            )
        );

        $this->response->type('json');
        $this->response->statusCode($code);
        $this->response->body($json);

        return $this->response;
    }
}
