<?php

namespace App\Actions\User;

use App\Exceptions\CustomException;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginUser
{
    public function execute(Request $request)
    {
        try {
            $response = ['message' => '', 'code' => 0, 'error' => false, 'data' => []];

            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'password' => 'required|string|min:6'
            ]);

            if ($validator->fails()) {
                throw new CustomException('Email or password invalid', 400);
            }

            $email = $request->email;
            $requestPassword = $request->password;

            $user = User::where('email', $email)->first();

            if ($user) {
                $password = $user->password;
                $rightPassword = Hash::check($requestPassword, $password);

                if ($rightPassword) {
                    $token = Auth::login($user);

                    $response['message'] = 'User logged successfully';
                    $response['code'] = 200;
                    $response['data'] = [
                        'authorization' => [
                            'token' => $token
                        ]
                    ];
                } else {
                    throw new CustomException('Wrong password', 404);
                }
            } else {
                throw new CustomException('User not found', 404);
            }
        } catch (CustomException $customEx) {
            $response['message'] = $customEx->getMessage();
            $response['code'] = $customEx->getCode();
            $response['error'] = $customEx->getError();
        } catch (Exception $ex) {
            $response['message'] = 'Something went wrong';
            $response['code'] = 500;
            $response['error'] = true;
        }

        return response()->json($response);
    }
}
