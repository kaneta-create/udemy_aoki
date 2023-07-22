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
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('contact');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->boolean('name')->unique();
            $table->boolean('email')->unique();
            $table->boolean('gender')->unique();
            $table->boolean('age')->unique();
            $table->boolean('contact')->unique();
        });
    }
};
