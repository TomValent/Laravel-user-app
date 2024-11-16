<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserApiController
 *
 * @namespace App\Http\Controllers
 *
 * @author Tomas Valent
 */
class UserApiController
{
    /**
     * @return JsonResponse
     */
    public function getUsers(): JsonResponse
    {
        return new JsonResponse();
    }

    /**
     * @return JsonResponse
     */
    public function getUser(): JsonResponse
    {
        return new JsonResponse();
    }

    /**
     * @return JsonResponse
     */
    public function userAddress(): JsonResponse
    {
        return new JsonResponse();
    }
}
