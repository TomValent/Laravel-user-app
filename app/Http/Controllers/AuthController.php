<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Class AuthController
 *
 * @namespace App\Http\Controllers
 *
 * @author Tomas Valent
 */
class AuthController
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|void
     *
     * @throws ValidationException
     */
    public function handle(Request $request)
    {
        $request->validate([
            "email"    => "required|email",
            "password" => "required|min:8",
            "action"   => "required|in:login,register",
        ]);

        /** @var UserModel|null $user */
        $user = UserModel::where("email", $request->email)->get();

        if ($user) {
            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                return redirect()->route("addressForm");
            } else {
                throw ValidationException::withMessages([
                    "email" => ["Invalid login credentials."],
                ]);
            }
        } else {
            User::create([
                "name"     => $request->name,
                "email"    => $request->email,
                "password" => Hash::make($request->password),
            ]);

            Auth::attempt(["email" => $request->email, "password" => $request->password]);

            return redirect()->route("addressForm");
        }
    }
}
