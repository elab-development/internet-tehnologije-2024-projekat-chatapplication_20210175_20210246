<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $poruke=Poruka::all();
       return response() -> json($poruke);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'OdKoga' => 'required|exists:users,id',
            'ZaKoga' => 'required|exists:users,id'
        ]);
        $poruka = Poruka::create($request->all());
        return response()->json($poruka,201); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $poruka = Message::find($id); // Dobijanje jedne poruke prema ID-u
        if (!$poruka) {
            return response()->json(['error' => 'Message not found'], 404);
        }
        return response()->json($poruka);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $poruka = Poruka::find($id);
        if(!$poruka){
            return response()->json(['error'=>'poruka nije pronadjena'],404);
        }
        $request->validate([
            'OdKoga' => 'required|exists:users,id',
            'ZaKoga' => 'required|exists:users,id'
        ]);
        $poruka ->update($request ->all);
        return response()-> json($poruka);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poruka = Poruka::find($id);
        if(!$poruka){
            return response()->json(['error'=>'poruka nije pronadjena'],404);
        }
        $poruka ->delete();
        return response()-> json(['message'=>'poruka uspesno obrisana']);
    }
}
