<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->filled('type_id')){
            $projects = Project::where('type_id',$request['type_id'])->get();
        }else{
            $projects = Project::all();
        }

        $types = Type::all();

        return view("projects.index", compact("projects","types"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $tecs = Technology::all();
        return view("projects.create", compact('types','tecs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validazione dei dati
        $data = $request->validate([
            "name" => "required|string|max:255",
            "client" => "required|string|max:255",
            "year" => "required|integer|min:2010|max:".(date("Y")),
            "description" => "required|string",
            "type_id" => "nullable|exists:types,id",
            "tecs" => "nullable|array",
            "tecs.*" => "exists:technologies,id"   //tutti gli elementi dentro l'array devono corrispondere a un id registrato nella tabella tecnology
        ],
        [
            "name.required" => "Il nome del progetto è obbligatorio.",
            "name.string" => "Il nome del progetto deve essere un testo.",
            "name.max" => "Il nome del progetto è troppo lungo.",
            "client.required" => "Il nome del cliente è obbligatorio.",
            "client.string" => "Il nome del cliente deve essere un testo.",
            "client.max" => "Il nome del cliente è troppo lungo.",
            "year.required" => "L'anno di realizzazione è obbligatorio.",
            "year.integer" => "L'anno di realizzazione deve essere un numero intero.",
            "year.min" => "L'anno non può essere inferiore al 2010.",
            "year.max" => "L'anno non può essere superiore all'anno corrente.",
            "description.required" => "La descrizione è obbligatoria.",
            "description.string" => "La descrizione deve essere un testo.",
            "type_id.exists" => "La tipologia selezionata non esiste.",
            "tecs.array" => "valori non validi",
            "tecs.exists" => "valori non esistenti nel database"
        ]
        );

        //$data = $request->all(); //crea un array con tutti le coppie chiave-valore che arrivano dal form

        $newProject = new Project();

        $newProject->name = $data["name"];
        $newProject->client = $data["client"];
        $newProject->year = $data["year"];
        $newProject->description = $data["description"];
        $newProject->type_id = $data["type_id"] ?? null;

        $newProject->save();

        //dopo aver salvato il progetto e creato il suo id posso creare la sua relazione molti-a-molti con le tecnologie
        if($request->has('tecs')){
             $newProject->technologies()->attach($data['tecs']);
        }


        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        $previousProject = Project::where('id', '<', $project->id)  //filtro tutti i progetti con id minore di quello attuale
            ->orderBy('id', 'desc')                                 //ordino in modo decrescente
            ->first();                                              //prendo il primo elemento (quello con id piu alto)

        $nextProject = Project::where('id', '>', $project->id)      //filtro tutti i progetti con id maggiore di quello attuale
            ->orderBy('id', 'asc')                                  //ordino in modo crescente
            ->first();                                              //prendo il primo elemento (quello con id piu basso)

        return view('projects.show', compact('project', 'previousProject', 'nextProject')); //passo alla view i tre progetti


        //Altri modi per recuperare post -function show(string $id){}
        //$project = Project::where("id", $id)->get();
        //$project = Project::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $tecs = Technology::all();
        return view("projects.edit", compact("project", "types","tecs"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //validazione dei dati
        $data = $request->validate([
            "name" => "required|string|max:255",
            "client" => "required|string|max:255",
            "year" => "required|integer|min:2010|max:".(date("Y")),
            "description" => "required|string",
            "type_id" => "nullable|exists:types,id",
            "tecs" => "nullable|array",
            "tecs.*" => "exists:technologies,id"   //tutti gli elementi dentro l'array devono corrispondere a un id registrato nella tabella tecnology
        ],
        [
            "name.required" => "Il nome del progetto è obbligatorio.",
            "name.string" => "Il nome del progetto deve essere un testo.",
            "name.max" => "Il nome del progetto è troppo lungo.",
            "client.required" => "Il nome del cliente è obbligatorio.",
            "client.string" => "Il nome del cliente deve essere un testo.",
            "client.max" => "Il nome del cliente è troppo lungo.",
            "year.required" => "L'anno di realizzazione è obbligatorio.",
            "year.integer" => "L'anno di realizzazione deve essere un numero intero.",
            "year.min" => "L'anno non può essere inferiore al 2010.",
            "year.max" => "L'anno non può essere superiore all'anno corrente.",
            "description.required" => "La descrizione è obbligatoria.",
            "description.string" => "La descrizione deve essere un testo.",
            "type_id.exists" => "La tipologia selezionata non esiste."
        ]
        );

        $project->name = $data["name"];
        $project->client = $data["client"];
        $project->year = $data["year"];
        $project->description = $data["description"];
        $project->type_id = $data["type_id"] ?? null;

        $project->update(); //salva le modifiche al database

        if($request->has('tecs')){                              //se nella richiesta c'è il parametro tecs
             $project->technologies()->sync($data['tecs']);     //sincronizza le relazioni= salva id non presenti in db, cancella gli id non presenti in tecs
        }
        else{$project->technologies()->detach();}               //se non c'è parametro tecs, vuol dire che nessuno è stato selezionato e quindi cancella tutte le relazioni del progetto con le tecs


        return redirect()->route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route("projects.index");
    }
}
