<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Actuality;
use App\Models\Admin\Property;
use App\Models\Contract;
use App\Models\Image;
use App\Models\Tenant;
use App\Models\User;
use App\Service\ImagePathGenerator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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