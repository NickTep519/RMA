<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Service\ImagePathGenerator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

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
                        'required', 'string', 'regex:/^\+(\d{3})\d{8,12}$/',
                        Rule::unique(User::class) 
                    ], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ] ;

        $messages = [
            'phone.regex' => 'Le numéro de téléphone n\'est pas dans un format valide.',
            'phone.unique' => 'Ce numéro de téléphone est déjà utilisé.',
        ] ; 

        $validator = Validator::make($request->all(), $rules, $messages) ; 

        if ($validator->fails()) { 
            return redirect('register')->withErrors($validator)->withInput() ; 
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'profile_image' => app(ImagePathGenerator::class)->generate('profil_default.jpg', ['h'=>200, 'w'=>200])
        ]) ;

        event(new Registered($user));

        Auth::login($user);

        return to_route('profile.edit') ; 
       
    }
}