<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //collego la tipologia al progetto. 1 tipologia può avere più progetti
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
