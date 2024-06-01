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
        Schema::table('users', function (Blueprint $table) {
            // Mover 'username' antes de 'email'
            $table->string('username')->unique()->nullable(false)->after('id');

            // Mover 'fecha_nacimiento' después de 'rememberToken'
            $table->date('fecha_nacimiento')->nullable()->after('remember_token');

            // Mover 'imagen_perfil' después de 'fecha_nacimiento'
            $table->string('imagen_perfil')->nullable()->after('fecha_nacimiento');

            // Mover 'descripcion' después de 'imagen_perfil'
            $table->text('descripcion')->nullable()->after('imagen_perfil');
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
