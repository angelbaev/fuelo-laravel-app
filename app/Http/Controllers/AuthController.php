<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\AuthService;
use App\DataTransferObjects\AuthDataTransferObject;
use App\DataTransferObjects\UserDataTransferObject;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Exceptions\HttpResponseException;


class AuthController extends Controller
{

    public function __construct(protected AuthService $authService) 
    {
    }    

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(AuthRegisterRequest $request) {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        $user = $this->authService->create($validated);

        return response()->json($user, 201);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthLoginRequest  $request)
    {
        $credentials = $request->validated();

        if (! $token = $this->authService->attempt($credentials)) {

            throw new HttpResponseException( response()->json(['errors' => 'Unauthorized'], 401));
        }
        
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    { //
        return AuthResource::make(AuthDataTransferObject::fromArray([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => UserDataTransferObject::fromModel(auth()->user())
        ]));
    }
}