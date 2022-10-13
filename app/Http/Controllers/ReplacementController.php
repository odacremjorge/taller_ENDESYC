<?php

namespace App\Http\Controllers;

use App\Models\Replacement;
use App\Models\OT;
use App\Models\Operator;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('replacement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData=$request->validate([
            'CodigoRepuesto' => ['required', 'max:30'],
            'DescripcionRepuesto' => ['required', 'max:100'],
            'Solicitante' => ['required'],
            'CantidadRepuesto' => ['required'],
            'UnidadRepuesto' => ['required', 'max:30'],
          
        ]);
        //
        $OperadorId = Operator::where('name_operator', $request->Solicitante)->first();
        //$otId = OT::where('o_t_s.id', $request->ot_id)->first();

        $replacement=Replacement::create([

            'amount'=> $request->CantidadRepuesto,
            'unit'=> $request->UnidadRepuesto,
            'description'=> $request->DescripcionRepuesto,
            'codigo'=> $request->CodigoRepuesto,
            'price_replacement'=> $request->PrecioRepuesto,
            'num_replacement'=> $request->NumRepuesto,
            'operator_id'=> $OperadorId->id,
            'ot_id'=>$request->ot_id,
                        
        ]);
        return redirect('/ot/'.$request->ot_id.'/edit')->with('Mensaje', 'HEY, Repuesto creado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function show(Replacement $replacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $replacement = Replacement::findOrFail($id);
        return view('replacement.edit', ['replacement' => $replacement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $replacement = Replacement::findOrFail($id);
            $replacement->amount = $request->CantidadRepuesto;
            $replacement->unit = $request->UnidadRepuesto;
            $replacement->description = $request->DescripcionRepuesto;
            $replacement->codigo = $request->CodigoRepuesto;
            $replacement->price_replacement = $request->PrecioRepuesto;
            $replacement->num_replacement = $request->NumRepuesto;
            $replacement->save();
            //return redirect()->back()->with('Mensaje', 'HEY, actualizacion satisfactoriamente!!!');
            return redirect('/ot/showOT')->with('Mensaje', 'HEY, Repuesto actualizado satisfactoriamente!!!');

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Replacement $replacement)
    {
        //
        $replacement->delete();
       
       
        return redirect()->back()->with('Mensaje', 'HEY, Repuesto eliminado satisfactoriamente!!!');
    }
}
