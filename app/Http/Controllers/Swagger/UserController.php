<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary="Авторизация",
 *     tags={"User"},
 *     
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf = {
 *                 @OA\Schema(
 *                     @OA\Property(property="email", type="string", example="test@examp.com"),
 *                     @OA\Property(property="password", type="string", example="password"),
 *                 )
 *
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE3MzA1NzE5MDMsImV4cCI6MTczMDU3NTUwMywibmJmIjoxNzMwNTcxOTAzLCJqdGkiOiJrUHlQNXo3eGZPQ3pJVzBwIiwic3ViIjoiMSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.Aob4GhH8aw6nUsU-m8jTYXlZj5QJwYZUofbCSXM2HVI"),
 *             @OA\Property(property="token_type", type="string", example="bearer"),
 *             @OA\Property(property="expires_in", type="integer", example=3600),
 *         ),
 *     ),
 * ),
 * 
 * 
 */
class UserController extends Controller
{
}
