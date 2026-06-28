<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();


        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); //crea un array con tutti le coppie chiave-valore che arrivano dal form

        $newProject = new Project();

        $newProject->name = $data["name"];
        $newProject->client = $data["client"];
        $newProject->year = $data["year"];
        $newProject->description = $data["description"];

        $newProject->save();

        return redirect()->route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {

        return view("projects.show", compact("project"));

        //Altri modi per recuperare post -function show(string $id){}
        //$project = Project::where("id", $id)->get();
        //$project = Project::find($id);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->name = $data["name"];
        $project->client = $data["client"];
        $project->year = $data["year"];
        $project->description = $data["description"];

        $project->update(); //salva le modifiche al database

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
