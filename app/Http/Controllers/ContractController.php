<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        $contract = new Contract() ; 

        $contract->fill([

        ]) ; 

        return view('managers.contracts.form', [

                'contract' => $contract
        ]) ; 
    }

    
    public function store(Request $request)
    {
        //
    }

  
    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        //
    }

   
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(string $id)
    {
        //
    }
}
