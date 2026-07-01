<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecs = Technology::all();
        return view("technologies.index", compact("tecs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("technologies.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => "required|string|max:255|unique:technologies,name",
            'color' => "required|string|regex:/^#[0-9A-Fa-f]{6}$/"
            ],[
                "name.required" => "Il nome è obbligatorio",
                "name.string" => "Il nome deve essere un testo",
                "name.max" => "Il nome è troppo lungo",
                "name.unique" => "La tecnologia è già esistente",
                "color.required" => "Il colore è obbligatorio.",
                "color.regex" => "Il colore deve essere in formato HEX, ad esempio #ff1100.",
            ]);

            $newTec = new Technology();
            $newTec->name = $data['name'];
            $newTec->color = $data['color'];
            $newTec->save();

            return redirect()->route('technologies.index');
    }

    /**
     * Display the specified resource.
     */
    /* public function show(string $id)
    {
        return redirect()->route('technologies.index');
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit',compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name' => "required|string|max:255|unique:technologies,name",
             'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('technologies', 'name')->ignore($technology->id) //se il nome non viene modificato, senza ignore darebbe errore perché esiste già.
            ],
            'color' => "required|string|regex:/^#[0-9A-Fa-f]{6}$/"
            ],[
                "name.required" => "Il nome è obbligatorio",
                "name.string" => "Il nome deve essere un testo",
                "name.max" => "Il nome è troppo lungo",
                "name.unique" => "La tecnologia è già esistente",
                "color.required" => "Il colore è obbligatorio.",
                "color.regex" => "Il colore deve essere in formato HEX, ad esempio #ff1100.",
            ]);

            $technology->name = $data['name'];
            $technology->color = $data['color'];

            $technology->update();

            return redirect()->route('technologies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        // $technology->projects()->detach();   non serve se ho cascadeOnDelete sulla migration

         $technology->delete();
        return redirect()->route("technologies.index");
    }
}
