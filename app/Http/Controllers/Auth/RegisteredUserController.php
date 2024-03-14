<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin\Property;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register') ;
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'phone' => [
                        'required', 'string',
                        Rule::unique(User::class) 
                    ], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ] ;

        $messages = [
            'phone.regex' => 'Le numéro de téléphone n\'est pas dans un format valide.',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé par un autre utilisateur.',
        ] ; 

        $validator = Validator::make($request->all(), $rules, $messages) ; 

        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput() ; 
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]) ;

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME) ; 
       
    }
}