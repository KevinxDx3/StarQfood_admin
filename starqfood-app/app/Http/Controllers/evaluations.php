<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;

class evaluations extends Controller
{
    //
    public function store(Request $request)
    {
        
        $evaluation = evaluation::create($request->all());
    
        return redirect()->route('restaurants.show', $request->ruc_fk);

        
    }

    public function update(Request $request, evaluation $evaluation)
    {
        $evaluation->update($request->all());


    }

    public function destroy(evaluation $evaluation)
    {
        $evaluation->delete();

        return response()->json(null, 204);
    }

    public function show(evaluation $evaluation)
    {

    }
}
