<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
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
            "name"     => "nullable|min:4",
            "email"    => "required|email",
            "password" => "required|min:8",
        ]);

        /** @var UserModel|null $user */
        $user = UserModel::where("email", $request->email)->first();

        if ($user instanceof UserModel) {
            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                if ($request->name && !$user->name) {
                    $user->name = $request->name;
                    $user->save();
                }
            } else {
                return back()->withErrors(['email' => 'Invalid login credentials.'])->withInput();
            }
        } else {
            $user = UserModel::create([
                "name"     => $request->name,
                "email"    => $request->email,
                "password" => Hash::make($request->password),
            ]);

            Auth::attempt(["email" => $request->email, "password" => $request->password]);
        }

        return redirect()->route("addressForm", ["userId" => $user->id]);
    }
}
