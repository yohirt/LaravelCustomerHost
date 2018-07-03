<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        dd ($clients);
        return view('clients.index', compact('clients'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->name_client = $request->get('name_client');
        $client->adress_client = $request->get('adress_client');
        $client->city_client = $request->get('city_client');
        $client->email_client = $request->get('email_client');
        $client->postal_code_client = $request->get('postal_code_client');
        $client->tel_client = $request->get('tel_client');
        $client->save();
        return redirect('clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        $client->name_client = $request->get('name_client');
        $client->adress_client = $request->get('adress_client');
        $client->city_client = $request->get('city_client');
        $client->email_client = $request->get('email_client');
        $client->postal_code_client = $request->get('postal_code_client');
        $client->tel_client = $request->get('tel_client');
        $client->save();
        return redirect('clients');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect('clients')->with('success', 'Prawidłowo usunięto wpis');

    }
}
