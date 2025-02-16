<?php

// app/Http/Controllers/Api/AuthController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $user = $this->authService->register($request->all());
         // تسجيل دخول المستخدم الجديد تلقائيًا
         auth()->login($user);

         // إنشاء التوكن
         $token = $user->createToken('API Token')->plainTextToken;
         return response()->json(['token' => $token,'user' => $user], 200);
        }

    public function login(Request $request)
    {
        $user = $this->authService->login($request->only('email', 'password'));
        if ($user) {
            $token = $user->createToken('API Token')->plainTextToken;
            return response()->successApi(['token' => $token,'user' => $user], "success login");
        }
        return response()->errorApi( 'Invalid credentials', 401);

     }
}
