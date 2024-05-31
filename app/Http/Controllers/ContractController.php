<?php

namespace App\Http\Controllers;

use App\Events\ContractEvent;
use App\Http\Requests\ContractRequest;
use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    
    public function create()
    {
        $contract = new Contract() ; 

        $contract->fill([

        ]) ; 

        return view('managers.contracts.form', [

                'contract' => $contract
        ]) ; 
    }

    
    public function store(ContractRequest $request)
    {
        $contract = Contract::create($request->validated())  ; 
        
        event(new ContractEvent($contract)) ; 

        return to_route('dashboard')->with('success', 'Le Contrat a bien été emis') ; 
        
    }

  
    public function edit(Contract $contract)
    {
        return view('managers.contracts.form', [
            'contract' => $contract
        ]) ; 
    }

   
    public function update(ContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated())  ; 
        
        event(new ContractEvent($contract)) ; 

        return to_route('dashboard')->with('success', 'Le Contrat a bien été modifié') ;
    }

    
    public function destroy(Contract $contract)
    {
        $tenant_name = $contract->tenant_name ; 

        $contract->delete()  ; 

        return to_route('dashboard')->with('success', 'Le contrat de '.$tenant_name.' a été bien détruit') ; 
    }
}
