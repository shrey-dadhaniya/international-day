<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\returnArgument;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        //Validate data
        $data = $request->only('mobile_no');
        $validator = Validator::make($data, [
            'mobile_no' => 'required|string|min:10|max:10'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = User::create([
            'email' => $request->mobile_no . User::USER_DEFAULT_EMAIL,
            'mobile_no' => $request->mobile_no,
            'is_api_user' => 1,
            'password' => bcrypt(User::USER_DEFAULT_PASSWORD)
        ]);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('mobile_no');

        //valid credential
        $validator = Validator::make($credentials, [
            'mobile_no' => 'required|string|min:10|max:10'
        ]);
        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try {
            $credentials = $this->getCredentials($request->mobile_no);
            if ($credentials) {
                if (!$token = \JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Login credentials are invalid.',
                    ], 400);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException | \Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not create token.',
            ], 500);
        }

        //Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->bearerToken());

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException | \Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get_user(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        return response()->json(['user' => $user]);
    }

    private function getCredentials($mobile_no)
    {
        $u = User::where('mobile_no', $mobile_no)->where('is_api_user', 1)->first();
        if (isset($u->email)) {
            return $credentials = ['email' => $u->email, 'password' => User::USER_DEFAULT_PASSWORD];
        }
        return null;
    }
}