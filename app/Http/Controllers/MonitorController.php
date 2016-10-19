<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Monitor;
class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monitors = Monitor::all();

        if ($monitors)
            return response()->json(["Status" => "Ok", "Data" => $monitors], 200);
        else 
            return response()->json(["Status" => "Error"], 404);

        //devuelve un json con todo el contenido cargado en la variable
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
        $monitor = new Monitor();
        $monitor->size = $request->size;
        $monitor->outputs = $request->outputs;
        $monitor->code = $request->code;       

        if ($monitor->save())
            return response()->json(["Status" => "Ok", "Data" => $monitor], 200);
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
        $monitor = Monitor::find($id);

        if ($monitor)
            return response()->json(["Status" => "Ok", "Data" => $monitor], 200);
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
        $monitor = Monitor::find($id);
        $monitor->size = $request->size;
        $monitor->outputs = $request->outputs;
        $monitor->code = $request->code;

        if ($monitor->save())
            return response()->json(["Status" => "Ok", "Data" => $monitor], 200);
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
        $monitor=Monitor::find($id);

        if ($monitor->delete())
            return response()->json(["Status" => "Ok"], 200);
        else 
            return response()->json(["Status" => "Error"], 404);
    }

    public function addClient($idMonitor, $idClient)
        {
            $monitor = Monitor::find($idMonitor);
            $client = Client::find($idClient);
            if ($monitor){
                if($client){
                    $monitor->id_client = $client->id;
                    if($monitor->save()){
                        return response()->json(["Status" => "Ok", "Data" => $monitor], 200);
                    }else{
                        return response()->json(["Status" => "Error"], 404);
                    }
                }else{
                    return response()->json(["Status" => "No existe cliente seleccionado"], 404);
                }
            }else{
                return response()->json(["Status" => "No existe monitor seleccionado"], 404);
            }
        }

        
}
