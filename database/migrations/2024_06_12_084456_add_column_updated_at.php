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
        Schema::table('Jalan_Pacitan', function (Blueprint $table) {
            $table->string('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //drop column image
        Schema::table('Jalan_Pacitan', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });
    }
};
