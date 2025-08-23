<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        try {
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

    public function register(Request $registerRequest)
    {
        try {
            DB::beginTransaction();

            User::create([
                'name' => $registerRequest['name'],
                'username' => $registerRequest['username'],
                'contact' => $registerRequest['contact'],
                'email' => $registerRequest['email'],
                'password' => Hash::make($registerRequest['password']),
            ]);

            DB::commit();
            return $this->sendResponse();
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->error500($e->getMessage());
        }
    }
}
