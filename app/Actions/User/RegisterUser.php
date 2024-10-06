<?php

namespace App\Actions\User;

use App\Exceptions\CustomException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterUser
{
    public function execute(Request $request)
    {
        $response = [
            'message' => '',
            'code' => 0,
            'error' => false,
            'data' => []
        ];

        try {
            $validator = Validator::make($request->all(), [
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'cpf' => 'required|string|unique:users,cpf',
                'birthDate' => 'required|date',
                'role' => ['nullable', Rule::in(['student', 'teacher', 'admin'])],
                'password' => 'required|string|min:6'
            ]);

            if ($validator->fails()) {
                throw new CustomException($validator->errors()->first(), 400);
            }

            $user = User::create([
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'cpf' => $request->cpf,
                'birth_date' => $request->birthDate,
                'role' => $request->role,
                'password' => bcrypt($request->password)
            ]);

            $response['message'] = 'User created successfully';
            $response['code'] = 201;
            $response['data'] = [
                'name' => $user->first_name,
                'email' => $user->email
            ];
        } catch (CustomException $customE) {
            $response['message'] = $customE->getMessage();
            $response['code'] = $customE->getCode();
            $response['error'] = true;
        } catch (Exception ) {
            $response['message'] = 'Something went wrong, please try again later.';
            $response['code'] = 500;
            $response['error'] = true;
        }

        return response()->json($response);
    }
}
