<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|exists:users,username',
                'password' => 'required|min:8'
            ]);

            if ($validator->fails()) {
                return $this->validatorResponse($validator->errors(), 422);
            }

            $user = User::where('username', $request['username'])->first();

            if (!$user) {
                return $this->errorResponse('Credential did not match', 400);
            }

            if (Hash::check($request['password'], $user->password)) {
                Auth::login($user);
                $token = $user->createToken($request['username']);
                return $this->sendResponse(['token' => $token->plainTextToken, 'user' => $user]);
            }
            return $this->errorResponse('Credential did not match', 400);
        } catch (Throwable $e) {
            return $this->error500($e->getMessage());
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'username' => 'required|string|unique:users,username',
                'contact' => 'required|string|unique:users,contact',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return $this->validatorResponse($validator->errors(), 422);
            }

            DB::beginTransaction();

            User::create([
                'name' => $request['name'],
                'username' => $request['username'],
                'contact' => $request['contact'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            DB::commit();
            return $this->sendResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->error500($e->getMessage());
        }
    }

    public function sendOTP(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|exists:users,email'
            ]);

            if ($validator->fails()) {
                return $this->validatorResponse($validator->errors(), 422);
            }

            $otp = rand(0000, 9999);

            $user = User::where('email', $request['email'])->first();
            $user->update(['otp' => $otp]);

            return $this->sendResponse(['otp' => $otp]);
        } catch (Throwable $e) {
            return $this->error500($e->getMessage());
        }
    }

    public function verifyOTP(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|exists:users,email',
                'otp' => 'required|size:4'
            ]);

            if ($validator->fails()) {
                return $this->validatorResponse($validator->errors(), 422);
            }

            $user = User::where('email', $request['email'])->first();

            if ($user->otp !== $request['otp']) {
                return $this->errorResponse('OTP did not match.', 400);
            }

            $user->update(['otp' => null]);

            return $this->sendResponse();
        } catch (Throwable $e) {
            return $this->error500($e->getMessage());
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|exists:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            ]);

            if ($validator->fails()) {
                return $this->validatorResponse($validator->errors(), 422);
            }
            $user = User::where('email', $request['email'])->first();

            $user->update(['password' => Hash::make($request['password'])]);

            return $this->sendResponse();
        } catch (Throwable $e) {
            return $this->error500($e->getMessage());
        }
    }
}
