<?php

namespace App\Actions\User;

use App\Models\User;
use Exception;

class ListUsers
{
    public function execute()
    {
        $response = ['message' => '', 'code' => 0, 'error' => false, 'data' => []];

        try {
            $users = User::all();

            $response['message'] = 'Executed with success';
            $response['code'] = 200;
            $response['data'] = $users;
        } catch (Exception $ex) {
            $response['message']= 'Something wrong';
            $response['code']= 500;
            $response['error']= true;
        }

        return response()->json($response);
    }
}
