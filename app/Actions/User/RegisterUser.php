<?php

namespace App\Actions\User;

use App\Exceptions\CustomException;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class RegisterUser
{
    public function execute(Request $request)
    {
        $response = ['message' => '', 'code' => 0, 'error' => false, 'data' => []];

        try {
            $validator = Validator::make(request()->all(), [
                'name' => 'required|string',
                'lastName' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'cpf' => 'required|string|unique:users,cpf',
                'birthDate' => 'required|date',
                'role' => ['nullable', Rule::in(['student', 'teacher', 'admin'])],
                'password' => 'required|string|min:6'
            ]);

            if ($validator->fails()) {
                throw new CustomException($validator->errors(), 400);
            }

            $user = User::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'cpf' => $request->cpf,
                'birthDate' => $request->birthDate,
                'role' => $request->role,
                'password' => Hash::make($request->password)
            ]);

            $response['message'] = 'User created successfully';
            $response['code'] = 201;
            $response['data'] = ['name' => $user->name, 'email' => $user->email];
        } catch (CustomException $customEx) {
            $response['message'] = $customEx->getMessage();
            $response['code'] = $customEx->getCode();
            $response['error'] = $customEx->getError();
        } catch (Exception $ex) {
            $response['message'] = 'Something wrong';
            $response['code'] = 500;
            $response['error'] = false;
        }

        return response()->json($response);
    }
}
