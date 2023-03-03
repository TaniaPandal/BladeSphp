<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->bigIncrements('id_tracks')->unsigned();
            $table->string('name_tracks', 100);
            $table->string('URL', 200);
            $table->string('artist', 100);
            $table->string('genre', 50);
            $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->binary('foto')->nullable();
            $table->enum('status', ['Played', 'unPlayed'])->default('unPlayed');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
