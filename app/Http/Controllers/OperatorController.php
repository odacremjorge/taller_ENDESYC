<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;
use App\Models\Assignment;
use PDF;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('operator.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        return view('operator.create');
    }

    public function list()
    {
        $operators = Operator::all();
        return view('operator.list', compact('operators'));
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
            'Name_operator' => ['required', 'max:100'],
            'Code_operator' => ['required'],
          
        ]);

        Operator::create([
            'name_operator' => $request->Name_operator,
            'type_operator' => $request->Type_operator,
            'phone' => $request->Phone,
            'code_operator' => $request->Code_operator,
            'ci' => $request->Ci,
        ]);
        return redirect('/operator')->with('Mensaje', 'HEY, Operador creado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function show(Operator $operator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $operator = Operator::findOrFail($id);
        return view('operator.edit', ['operator' => $operator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $operator = Operator::findOrFail($id);
            $operator->name_operator = $request->Name_operator;
            $operator->type_operator = $request->Type_operator;
            $operator->phone = $request->Phone;
            $operator->code_operator = $request->Code_operator;
            $operator->ci = $request->Ci;
            $operator->save();
        return redirect('/operator/list')->with('Mensaje', 'HEY, Operador actualizado satisfactoriamente!!!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operator  $operator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operator $operator)
    {
        //
        $operator->delete();
       
       
        return redirect()->back()->with('Mensaje', 'HEY, Operador eliminado satisfactoriamente!!!');
       
    }

    public function listPDF()
    {
        //
        $operators = Operator::all();

        $pdf = PDF::loadView('operator.listPDF',['operators'=>$operators]);
        //$pdf->loadHTML('<h1>Test</h1>');
        //return $pdf->stream();
        //return view('operator.listPDF', compact('operators'));

       //$pdf = PDF::loadView('operator.listPDF', ['operators' => $operators])->setOptions(['defaultFont' => 'sans-serif']);

       //$dompdf->stream('my.pdf',array('Attachment'=>0));.
        return $pdf->stream('operator.listPDF',array('Attachment'=>false));
       
    }
    
    public function autocomplete(Request $request)
    {
        $search_text = $request->search;
        $operator_data = Operator::where('code_operator', 'LIKE', '%'. $search_text. '%')->get();
        return json_encode($operator_data,JSON_FORCE_OBJECT);
    }
    public function getData(Request $request)
    {
        $id = $request->id;
        $operator_data = Operator::findOrFail($id);
        //if ($operator_data->id == assign->id)
        $ownerExist = Assignment::where('operator_id', '=', $operator_data->id)->exists();
        if ($ownerExist == true)
        {
            $operator_data = array(
                'message_error'=>'ok',
                
            );
            return json_encode($operator_data,JSON_FORCE_OBJECT);   
        }
        return json_encode($operator_data,JSON_FORCE_OBJECT);
    }

    public function autocompleteDriver(Request $request)
    {
        $search_text = $request->search2;
        $operator_data = Operator::where('name_operator', 'LIKE', '%'. $search_text. '%')->get();
        return json_encode($operator_data,JSON_FORCE_OBJECT);
    }
    public function getDataDriver(Request $request)
    {
        $id = $request->id;
        $operator_data = Operator::findOrFail($id);
        return json_encode($operator_data,JSON_FORCE_OBJECT);
    }
    public function autocompleteSolicitante(Request $request)
    {
        $search_text = $request->search3;
        $operator_data = Operator::where('name_operator', 'LIKE', '%'. $search_text. '%')->get();
        return json_encode($operator_data,JSON_FORCE_OBJECT);
    }
    public function getDataSolicitante(Request $request)
    {
        $id = $request->id;
        $operator_data = Operator::findOrFail($id);
        return json_encode($operator_data,JSON_FORCE_OBJECT);
    }
    
}
