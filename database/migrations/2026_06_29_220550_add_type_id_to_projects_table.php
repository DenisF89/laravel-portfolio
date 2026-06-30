<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //elimino colonna type
            $table->dropColumn("type");
            //aggiungo colonna type_id come chiave esterna
            $table->foreignId("type_id")->nullable()->after("description")->constrained()->nullOnDelete();

            /*  METODI per gestire relazioni quando un record collegato viene eliminato:
                cascadeOnDelete();   // cancella anche i record figli (es:cancello utente->cancello anche i suoi commenti)
                defaultOnDelete();   // mette il valore di default (es:cancello categoria->il post prende categoria 1 "generale" - deve avere default value tipo default(1) e deve esistere la categoria id 1 )
                nullOnDelete();      // mette la foreign key a NULL (es:cancello categoria->il progetto rimane senza categoria - deve essere nullable() )
                restrictOnDelete();  // impedisce la cancellazione (es:cancellazione utente fallisce->ha un acquisto in corso)
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //elimino chiave esterna
            $table->dropForeign(["type_id"]);
            //elimino colonna type_id
            $table->dropColumn("type_id");

            //aggiungo colonna type
            $table->string("type")->nullable()->after("description");
        });
    }
};
