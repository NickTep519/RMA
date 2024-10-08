<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Events\ContractEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\ContractRequest;
use App\Models\Admin\Property;

class ContractController extends Controller
{
    
    public function create()
    {
        $contract = new Contract() ; 

        $contract->fill([

        ]) ; 


        return view('managers.contracts.form', [

                'contract' => $contract,
                'properties' => Property::where('user_id', Auth::user()->id)->where('sold', false)->pluck('title', 'id')
        ]) ; 
    }

    
    public function store(ContractRequest $request)
    {
        $contract = Contract::create($request->validated())  ; 
        
        event(new ContractEvent($contract)) ; 

        return to_route('dashboard')->with('success', 'Félicitation !!! Vous avez emis un nouveau contrat.') ; 
        
    }


    public function show(Contract $contract){

        if (! Gate::allows('update-contract', $contract)) {
            abort(403);
        }

        return view('managers.dashboard.rentals-historyque', [
            'user' => Auth::user(),
            'contract' => $contract
        ]) ; 
    }

  
    public function edit(Contract $contract)
    {

        if (! Gate::allows('update-contract', $contract)) {
            abort(403);
        }

        return view('managers.contracts.form', [
            'contract' => $contract,
            'properties' => Property::where('user_id', Auth::user()->id)->where('sold', false)->pluck('title', 'id')

        ]) ; 
    }


    public function update(ContractRequest $request, Contract $contract)
    {
        if (! Gate::allows('update-contract', $contract)) {
            abort(403);
        }

    
        $validatedData = $request->validated();
        $contract->update($validatedData) ; 

        dd($validatedData['property']) ; 
        
        $contract->integration_date = $validatedData['integration_date'] ; 
        $contract->save() ; 
    
        event(new ContractEvent($contract));
    
        return redirect()->route('dashboard')->with('success', 'Le Contrat de ' . $contract->tenant_name . ' a bien été modifié.');
    }
    

    
    public function destroy(Contract $contract)
    {
        $tenant_name = $contract->tenant_name ; 

        $contract->delete()  ; 

        return to_route('dashboard')->with('success', 'Le contrat de '.$tenant_name.' a été bien détruit') ; 
    }

}