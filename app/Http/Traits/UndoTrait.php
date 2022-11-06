<?php
     
namespace App\Http\Traits;
 
use App\Models\kaas;
use Illuminate\Database\Eloquent\SoftDeletes; 

trait UndoTrait {

    public function fetchUndo($object, $set)
    {
        $latest_undo = kaas::onlyTrashed()->latest()->first();
        return $latest_undo;
    }
}