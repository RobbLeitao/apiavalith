<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Computer;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::all();

        if ($computers)
            return response()->json(["Status" => "Ok", "Data" => $computers], 200);
        else 
            return response()->json(["Status" => "Error"], 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $computer = new Computer();
        $computer->code = $request->code;
        $computer->spect = $request->spect;
        $computer->ip = $request->ip;
        $computer->last_check = $request->last_check;
        $computer->client_id = $request->client_id;

        if ($computer->save())
            return response()->json(["Status" => "Ok", "Data" => $computer], 200);
        else 
            return response()->json(["Status" => "Error"], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $computer = Computer::find($id);
        if ($computer)
            return response()->json(["Status" => "Ok", "Data" => $computer], 200);
        else 
            return response()->json(["Status" => "Error"], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $computer = Computer::find($id);
        $computer->code = $request->code;
        $computer->spect = $request->spect;
        $computer->ip = $request->ip;
        $computer->last_check = $request->last_check;
        $computer->client_id = $request->client_id;

        if ($computer->save())
            return response()->json(["Status" => "Ok", "Data" => $computer], 200);
        else 
            return response()->json(["Status" => "Error"], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $computer = Computer::find($id);
        if ($computer->delete())
            return response()->json(["Status" => "Ok"], 200);
        else 
            return response()->json(["Status" => "Error"], 404);

    }
    
    public function addClient($idComputer, $idClient)
        {
            $computer = Computer::find($idComputer);
            $client = Client::find($idClient);
            if ($computer){
                if($client){
                    $computer->id_client = $client->id;
                    if($computer->save()){
                        return response()->json(["Status" => "Ok", "Data" => $computer], 200);
                    }else{
                        return response()->json(["Status" => "Error"], 404);
                    }
                }else{
                    return response()->json(["Status" => "No existe cliente seleccionado"], 404);
                }
            }else{
                return response()->json(["Status" => "No existe computadora seleccionada"], 404);
            }
        }
