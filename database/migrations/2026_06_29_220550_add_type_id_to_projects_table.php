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
            $table->foreignId("type_id")->nullable()->after("description")->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //elimino chiave esterna
            $table->dropForeign(["projects_type_id_foreign"]);
            //elimino colonna type_id
            $table->dropColumn("type_id");

            //aggiungo colonna type
            $table->string("type")->nullable()->after("description");
        });
    }
};
