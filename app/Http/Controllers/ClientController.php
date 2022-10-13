<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Client::all();
        return view('client.index', compact('clients'));
        //return view('client.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.create');
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
            'Name_client' => ['required', 'max:100'],
            'Nit' => ['required', 'max:50'],
          
        ]);

        Client::create([
            'name_client' => $request->Name_client,
            'nit' => $request->Nit,
           
        ]);
        return redirect('/operator/client')->with('Mensaje', 'HEY, Cliente creado satisfactoriamente!!!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $client = Client::findOrFail($id);
        return view('client.edit', ['client' => $client]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $client = Client::findOrFail($id);
            $client->name_client = $request->Name_client;
            $client->nit = $request->Nit;
            $client->save();
        return redirect('/operator/client')->with('Mensaje', 'HEY, Cliente actualizado satisfactoriamente!!!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
        $client->delete();
       
       
        return redirect()->back()->with('Mensaje', 'HEY, Cliente eliminado satisfactoriamente!!!');
       
    }
    public function autocomplete(Request $request)
    {
        $search_text = $request->search;
        $client_data = Client::where('name_client', 'LIKE', '%'. $search_text. '%')->get();
        return json_encode($client_data,JSON_FORCE_OBJECT);
    }
    public function getData(Request $request)
    {
        $id = $request->id;
        $client_data = Client::findOrFail($id);
        return json_encode($client_data,JSON_FORCE_OBJECT);
    }
}
