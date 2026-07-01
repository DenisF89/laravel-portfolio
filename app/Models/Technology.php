<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    //collego la tecnologia al progetto . Ogni tecnologia può avere più di un progetto.
    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}
