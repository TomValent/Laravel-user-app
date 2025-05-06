<?php

namespace App\Http\Controllers;

use App\Models\AddressModel;
use App\Models\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use League\ISO3166\ISO3166;
use Throwable;

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
        $users       = UserModel::all();
        $outputUsers = [];

        foreach ($users->all() as $user) {
            $outputUsers[] = $this->parseUser($user);
        }

        return new JsonResponse($outputUsers);
    }

    /**
     * @param positive-int $userId
     *
     * @return JsonResponse
     */
    public function getUser(int $userId): JsonResponse
    {
        $outputUser = $this->parseUser(UserModel::findOrFail($userId));

        return new JsonResponse($outputUser);
    }

    /**
     * @param positive-int $userId
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userAddress(int $userId, Request $request): RedirectResponse
    {
        $data = $request->all();

        try {
            UserModel::findOrFail($userId);
        } catch (Throwable $exception) {
            return redirect()->route('addressForm', ["userId" => $userId, "success" => "false"]);
        }

        $country = (new ISO3166())->alpha2($data["countryCode"])["name"];

        try {
            AddressModel::create([
                AddressModel::USER_ID      => $userId,
                AddressModel::CITY         => $data["city"],
                AddressModel::STREET       => $data["street"],
                AddressModel::ZIP          => $data["zip"],
                AddressModel::COUNTRY      => $country,
                AddressModel::COUNTRY_CODE => $data["countryCode"],
                AddressModel::EMAIL        => $data["email"] ?? null,
                AddressModel::PHONE        => $data["phone"] ?? null,
            ]);
        } catch (Throwable $exception) {
            return redirect()->route('addressForm', ["userId" => $userId, "success" => "false"]);
        }

        return redirect()->route('addressForm', ["userId" => $userId, "success" => "true"]);
    }

    /**
     * @param \App\Models\UserModel $user
     *
     * @return array<string, mixed>
     */
    private function parseUser(UserModel $user): array
    {
        $outputUser = [];

        foreach ($user->toArray() as $key => $value) {
            if ($key !== "password") {
                $outputUser[$key] = $user[$key];
            }
        }

        $outputUser["addresses"] = $user->addresses->toArray();

        return $outputUser;
    }
}
