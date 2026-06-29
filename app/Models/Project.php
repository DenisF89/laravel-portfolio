<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //collego il progetto alla tipologia, quindi un progetto può avere una sola tipologia
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
