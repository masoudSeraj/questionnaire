<?php

namespace App\Http\Controllers;

use App\Contracts\AuthContract;
use App\Contracts\LoginContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(public AuthContract $authContract, public LoginContract $loginContract)
    {
    }

    /**
     * login
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => ['required', 'string', 'regex:/^(\\+98|0)?9\\d{9}$/'],
            'password' => 'required|string',
        ], [
            'mobile.required' => 'فیلد موبایل الزامی است',
            'mobile.regex' => 'فرمت موبایل اشتباه است',
            'password.required' => 'فیلد پسوورد الزامی است!',
        ]);

        if ($validator->fails()) {
            return response()->json(['type' => 'error', 'message' => $validator->errors()], 401);
        }

        try {
            $response = $this->loginContract->login($validator->validated());
        } catch (Exception $e) {
            return response()->json(['type' => 'error', 'message' => 'خطایی رخ داد!', 'error' => $e->getMessage()]);
        }

        return response()->json($response);
    }

    /**
     * register
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'mobile' => ['required', 'string', 'regex:/^(\\+98|0)?9\\d{9}$/'],
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'فیلد نام الزامی است!',
            'lastname.required' => 'نام خانوادگی الزامی است',
            'mobile.required' => 'فیلد موبایل الزامی است',
            'mobile.regex' => 'فرمت موبایل اشتباه است',
            'password.required' => 'فیلد پسوورد الزامی است!',
            'password.min' => 'مینیم کاراکتر باید :min باشد!',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'type' => 'error',
                'message' => 'خطایی رخ داد!',
                'errors' => $validator->errors(),
            ], 401);
        }

        try {
            $response = $this->authContract->register($validator->validated());
        } catch (Exception $e) {
            return response()->json([
                'type' => 'error',
                'message' => 'خطایی رخ داد!',
                'errors' => $e->getMessage(),
            ]);
        }

        return response()->json($response);
    }

    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {

    }
}
