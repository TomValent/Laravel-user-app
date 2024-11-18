<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
     * @param positive-int $userId
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userAddress(int $userId, Request $request): RedirectResponse
    {
        \Illuminate\Support\Facades\Log::debug($userId . " " . json_encode($request->all()));

        return redirect()->route('addressForm', ["userId" => $userId, "success" => "true"]);
    }
}
