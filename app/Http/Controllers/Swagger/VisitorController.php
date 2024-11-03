<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

// CRUD store index show update destroy
/**
 * 
 * @OA\Post(
 *     path="/api/visitors",
 *     summary="Создание",
 *     tags={"Visitor"},
 *     security={{ "bearerAuth": {} }},
 *     
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf = {
 *                 @OA\Schema(
 *                     required={"email", "first_name", "last_name", "phone"},
 *                     @OA\Property(property="email", type="string", format="email", example="example@mail.com"),
 *                     @OA\Property(property="first_name", type="string", example="Джон"),
 *                     @OA\Property(property="last_name", type="string", example="Доу"),
 *                     @OA\Property(property="phone", type="string", example="+78005553535"),
 *                     @OA\Property(property="country", type="string", example="Россия"),
 *                 )
 *
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="email", type="string", example="example@mail.com"),
 *                 @OA\Property(property="first_name", type="string", example="Джон"),
 *                 @OA\Property(property="last_name", type="string", example="Доу"),
 *                 @OA\Property(property="phone", type="string", example="+78005553535"),
 *                 @OA\Property(property="country", type="string", example="Россия"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Токен не предоставлен или срок действия истек или не верный",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="Token not provided"),
 *                 @OA\Property(property="status_code", type="integer", example=401),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Unprocessable Entity",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The email field is required."),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="email", type="array", @OA\Items(
 *                      example="The email field is required."
 *                 )),
 *             ),
 *         ),
 *     ),
 * ),
 * 
 * 
 * @OA\Get(
 *     path="/api/visitors",
 *     summary="Список",
 *     tags={"Visitor"},
 *     security={{ "bearerAuth": {} }},
 *     
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="email", type="string", example="example@mail.com"),
 *                 @OA\Property(property="first_name", type="string", example="Джон"),
 *                 @OA\Property(property="last_name", type="string", example="Доу"),
 *                 @OA\Property(property="phone", type="string", example="+78005553535"),
 *                 @OA\Property(property="country", type="string", example="Россия"),
 *             )),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Токен не предоставлен или срок действия истек или не верный",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="Token not provided"),
 *                 @OA\Property(property="status_code", type="integer", example=401),
 *             ),
 *         ),
 *     ),
 * ),
 * 
 * @OA\Get(
 *     path="/api/visitors/{visitor}",
 *     summary="Единичная запись",
 *     tags={"Visitor"},
 *     security={{ "bearerAuth": {} }},
 *     
 *     @OA\Parameter(
 *         description="ID гостя",
 *         in="path",
 *         name="visitor",
 *         required=true,
 *         example=1,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="email", type="string", example="example@mail.com"),
 *                 @OA\Property(property="first_name", type="string", example="Джон"),
 *                 @OA\Property(property="last_name", type="string", example="Доу"),
 *                 @OA\Property(property="phone", type="string", example="+78005553535"),
 *                 @OA\Property(property="country", type="string", example="Россия"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Токен не предоставлен или срок действия истек или не верный",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="Token not provided"),
 *                 @OA\Property(property="status_code", type="integer", example=401),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Visitor] 2"),
 *                 @OA\Property(property="status_code", type="integer", example=404),
 *             ),
 *         ),
 *     ),
 * ),
 * 
 * 
 * @OA\Patch(
 *     path="/api/visitors/{visitor}",
 *     summary="Обновление",
 *     tags={"Visitor"},
 *     security={{ "bearerAuth": {} }},
 *     
 *     @OA\Parameter(
 *         description="ID гостя",
 *         in="path",
 *         name="visitor",
 *         required=true,
 *         example=1,
 *     ),
 *     
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf = {
 *                 @OA\Schema(
 *                     @OA\Property(property="email", type="string", example="exampleEdit@mail.com"),
 *                     @OA\Property(property="first_name", type="string", example="Джон"),
 *                     @OA\Property(property="last_name", type="string", example="Доу"),
 *                     @OA\Property(property="phone", type="string", example="+78005553535"),
 *                     @OA\Property(property="country", type="string", example="Россия"),
 *                 )
 *
 *             }
 *         )
 *     ),
 *     
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="email", type="string", example="exampleEdit@mail.com"),
 *                 @OA\Property(property="first_name", type="string", example="Джон"),
 *                 @OA\Property(property="last_name", type="string", example="Доу"),
 *                 @OA\Property(property="phone", type="string", example="+78005553535"),
 *                 @OA\Property(property="country", type="string", example="Россия"),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Токен не предоставлен или срок действия истек или не верный",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="Token not provided"),
 *                 @OA\Property(property="status_code", type="integer", example=401),
 *             ),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Visitor] 2"),
 *                 @OA\Property(property="status_code", type="integer", example=404),
 *             ),
 *         ),
 *     ),
 * ),
 * 
 * 
 * @OA\Delete(
 *     path="/api/visitors/{visitor}",
 *     summary="Удаление",
 *     tags={"Visitor"},
 *     security={{ "bearerAuth": {} }},
 *     
 *     @OA\Parameter(
 *         description="ID гостя",
 *         in="path",
 *         name="visitor",
 *         required=true,
 *         example=1,
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="done"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Not Found",
 *         @OA\JsonContent(
 *             @OA\Property(property="error", type="object",
 *                 @OA\Property(property="message", type="string", example="No query results for model [App\\Models\\Visitor] 2"),
 *                 @OA\Property(property="status_code", type="integer", example=404),
 *             ),
 *         ),
 *     ),
 * ),
 * 
 */
class VisitorController extends Controller
{
}
