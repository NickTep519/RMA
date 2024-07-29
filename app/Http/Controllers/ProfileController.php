<?php

namespace App\Http\Controllers;

use App\Models\Actuality;
use App\Models\Admin\Property;
use App\Models\Contract;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
    */

    public function index() : View
    {
        /*$app = app(ImagePathGenerator::class)->generate('Capture.png', 200, 200) ; 

        dd($app) ; */

        $user_id = Auth::user()->id ; 
        $properties = Property::query()->where('user_id', $user_id)->paginate(25) ; 
        $contracts = Contract::query()->where('user_id', $user_id)->with('property')->get() ; 
        $actualities = Actuality::query()->inRandomOrder()->take(2)->orderBy('created_at', 'asc')->get() ; 

        return view('managers.dashboard.dashboard', [
            'user'=> Auth::user(),
            'properties'=> $properties, 
            'contracts' => $contracts,
            'actualities' => $actualities,
        ]) ; 
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {

        $rules = [
            'name' => ['required', 'string', 'max:35'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^\+(\d{3})\d{8,12}$/', Rule::unique(User::class)->ignore(Auth::user()->id) ],
            'biography' => ['required', 'string', 'max:220']
        ] ; 

        $messages = [
            'name.max' => 'Nom trop long.',
            'phone.unique' => 'Numéro dejà utilisé.',
            'phone.regex' => 'Format non Valide',
            'biography.max' => 'Description trop longue.'
        ] ; 

        $validator = Validator::make($request->all(), $rules, $messages) ; 

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput() ; 
        }

        $user = $request->user() ; 

        dd($request->biography) ; 

        $user->name = $request->name ; 
        $user->city = $request->city ; 
        $user->email = $request->email ; 
        $user->phone = $request->phone ; 
        $user->biography = $request->biography ; 

        $user->save() ; 

        return Redirect::route('dashboard')->with('success', 'Votre profile a bien été mis à jour') ; 


        /*$request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');*/
    }

    /**
     * Delete the user's account.
    */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}