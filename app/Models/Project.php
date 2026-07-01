<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //collego il progetto alla tipologia, quindi un progetto può avere una sola tipologia
    public function type(){
        return $this->belongsTo(Type::class);
    }

    //collego il progetto alla tecnologia. Ogni progetto può avere più di una tecnologia.
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
