<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;

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

				if ($clients)
            return response()->json(["Status" => "Ok", "Data" => $clients], 200);
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
				$client = new Client();
				$client->name = $request->name;
				$client->lname = $request->lname;
				$client->sector = $request->sector;
				$client->email = $request->email;

				if ($client->save())
            return response()->json(["Status" => "Ok", "Data" => $client], 200);
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
				$client = client::find($id);
				if ($client)
            return response()->json(["Status" => "Ok", "Data" => $client], 200);
        else 
            return response()->json(["Status" => "NO SE VE NADA"], 404);
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
				$client = Client::find($id);
				$client->name = $request->name;
				$client->lname = $request->lname;
				$client->sector = $request->sector;
				$client->email = $request->email;

				if ($client->save())
            return response()->json(["Status" => "Ok", "Data" => $client], 200);
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
				$client = Client::find($id);
				if ($client->delete())
            return response()->json(["Status" => "Ok"], 200);
        else 
            return response()->json(["Status" => "Error"], 404);
		}
}
