<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repository\Auth\AuthRepositoryInterface;
use App\Http\Traits\ResponseTrait;

class AuthController extends Controller
{

    use ResponseTrait;
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository){
        $this->authRepository = $authRepository;
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3'
        ]);

        if ($validator->fails()) {
            return $this->responseError($validator->messages(), 400);
        }

        $user = $this->authRepository->register([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return $this->responseSuccess('User created successfully', 201, $user);
    }

    public function login(Request $request)
    {
        $credentials = $request->all();

        $validator = Validator::make($credentials, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->responseError($validator->messages(), 400);
        }

        if (! $token = $this->authRepository->login($credentials)) {
            return $this->responseError('Login credentials are invalid', 401);
        }

        return $this->responseSuccess('Login Success', 200, $token);
    }

    public function logout(Request $request)
    {
        $this->authRepository->logout($request->header('token'));
        return $this->responseSuccess('User has been logged out', 200);
    }

    public function who(Request $request)
    {
        $user = $this->authRepository->who($request->header('token'));
        return $this->responseSuccess('Success Fetch the Data', 200, $user);
    }
}
