<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request) {
        $response = [
            'success' => false,
            'error' => "Failed",
        ];

        $userModel = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ];

        $createdUser = $this->userRepository->create($userModel);

        if($createdUser) {
            $credentials = [
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ];

            if (!auth()->attempt($credentials)) {
                $response['error'] = 'Unauthorized';
                return response()->json($response, 401);
            }

            $token = auth()->user()->createToken('Personal Access Token')->accessToken;

            return response()->json([
                'success' => true,
                'access_token' => $token,
            ], 200);
        }

        return response()->json($response,500);
    }

    public function login(Request $request) {
        $response = [
            'success' => false,
            'access_token' => null,
        ];

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (!auth()->attempt($credentials)) {
            $response['success'] = false;
            return response()->json($response, 401);
        }

        $token = auth()->user()->createToken('Personal Access Token')->accessToken;

        return response()->json([
            'success' => true,
            'access_token' => $token,
        ], 200);
    }
}
