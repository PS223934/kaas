<?php

namespace App\Http\Controllers;

use App\Models\kaas;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes; 

class KaasController extends Controller
{  
    //validates data and checks url params
    public function validateData($db, $data, $row)
    {
        $fallback = url()->current();
        $query = request()->query();
        if ($data) {
            if (!$db->contains($row, $data)) {
                unset($query['kaas']);
                redirect($query ? $fallback . '?' . http_build_query($query) : $fallback);
                return "ITEM_NOT_EXIST";
            }
            $specific = kaas::where($row, $data)->first();
            return $specific;
        }
        return false;
    }

    //gets the Trashed item from the model with the id and restores it
    public function undo(Request $request) {
        $object = kaas::onlyTrashed()->where('id', $request->id);
        $object->restore();
        return response()->json(['status' => 'SUCCESS', 'object' => $object]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaas = kaas::all();
        $validate = $this->validateData($kaas, request('kaas'), 'name');
        
        return view('kaas.index', [
            'kazen' => $kaas, 
            'specific' => $validate,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validate = $this->validateData(kaas::all(), request('kaas'), 'name');
        return view('kaas.create', ['kaas' => $validate]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validateData(kaas::all(), $request->name, 'name');
        if ($validate != "ITEM_NOT_EXIST") {
            return redirect()->route('index', ['kaas' => $validate->name, 'error' => 'ITEM_ALREADY_EXISTS']);
        }

        $kaas = new kaas();
        $kaas->name = $request->name;
        $kaas->origin = $request->origin;
        $kaas->description = $request->description;
        $kaas->save();

        return redirect('/?kaas=' . $kaas->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kaas  $kaas
     * @return \Illuminate\Http\Response
     */
    public function show($kaas)
    {   
        $validate = kaas::where('id', $kaas)->first();
        if ($validate == null) {
            return redirect()->route('index' , ['error' => "ITEM_NULL"]);
        }

        return redirect()->route('index', ['kaas' => $validate->name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kaas  $kaas
     * @return \Illuminate\Http\Response
     */
    public function edit($kaas)
    {
        $validate = kaas::where('id', $kaas)->first();
        if ($validate == null) {
            return redirect()->route('index' , ['error' => "ITEM_NULL"]);
        }

        return view('kaas.edit', ['kaas' => kaas::find($kaas)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kaas  $kaas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kaas)
    {
        $data = kaas::find($kaas);
        $data->name = $request->name;
        $data->origin = $request->origin;
        $data->description = $request->description;
        $data->save();
        return redirect('/?kaas=' . $data->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kaas  $kaas
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $id = $this->validateData(kaas::all(), $request->id, 'id');
        if ($id == "ITEM_NOT_EXIST" || $id == false) {
            return response()->json(['status' => 'ITEM_NOT_EXIST']);
        }
        $object = kaas::where('id', $id->id);
        $object->delete();
        return response()->json(['status'=>'SUCCESS', 'object' => $id]);
    }
}
