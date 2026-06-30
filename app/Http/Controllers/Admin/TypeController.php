<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();
        return view("types.index", compact("types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("types.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:types,name',
            'description' => 'nullable|string'
        ],
        [   //testi errori
            'name.required' => 'Il nome della tipologia è obbligatorio.',
            'name.string' => 'Il nome della tipologia deve essere un testo.',
            'name.max' => 'Il nome della tipologia è troppo lungo.',
            'name.unique' => 'Questa tipologia esiste già.',
        ]);

        $newType = new Type();
        $newType->name = $data['name'];
        $newType->description = $data['description'];
        $newType->save();


        return redirect()->route('types.index');
    }


    //public function show(string $id){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
         return view("types.edit", compact("type"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('types', 'name')->ignore($type->id) //se il nome non viene modificato senza ignore darebbe errore perché esiste già.
            ],
            'description' => 'nullable|string'
        ],
        [   //testi errori
            'name.required' => 'Il nome della tipologia è obbligatorio.',
            'name.string' => 'Il nome della tipologia deve essere un testo.',
            'name.max' => 'Il nome della tipologia è troppo lungo.',
            'name.unique' => 'Questa tipologia esiste già.',
        ]);


        $type->name = $data['name'];
        $type->description = $data['description'];
        $type->update();


        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        /* Versione query usando model Project da importare nel controller
        Project::where('type_id', $type->id)->update([
            'type_id' => null
        ]);
        */

        //versione relazionale 1-many che restituisce l'array dei progetti collegati
        foreach ($type->projects as $project){
            $project->type_id = null;
            $project->save();
        }

        //versione con l'opzione fillable nel model (ora non funzionante)
        //$type->projects()->update(['type_id' => null]);

        $type->delete();
        return redirect()->route("types.index");
    }
}
