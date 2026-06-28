<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string("type")->nullable()->after("description");
        });

        $types = config("projects_types");                              //recupero l'array di tipi di progetto dal file di configurazione

        DB::table('projects')->get()                                    //recupero tutti i progetti dal database
        ->each(function ($project) use ($types) {                       //per ogni progetto eseguo la funzione che ha come parametro il progetto corrente e l'array di tipi
                    DB::table('projects')
                    ->where('id', $project->id)
                    ->update([
                        'type' => fake()->randomElement($types),        //randomElement prende un elemento casuale dall'array
                    ]);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn("type");
        });
    }
};
