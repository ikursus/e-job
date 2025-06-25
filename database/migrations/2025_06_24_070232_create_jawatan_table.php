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
        Schema::create('jawatan', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->comment('Jawatan Title');
            $table->text('description')->nullable();
            $table->date('date_from')->nullable();
            $table->date('date_till')->nullable();
            $table->integer('quota')->default(1);
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawatan');
    }
};
