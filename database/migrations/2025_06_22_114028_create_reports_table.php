<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reports', function (Blueprint $table) {
        $table->id('report_id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('reporter_name')->nullable();
        $table->string('reporter_phone')->nullable();
        $table->string('title');
        $table->text('description');
        $table->string('image_path')->nullable();
        $table->text('location')->nullable();
        $table->enum('status', ['pending', 'in_progress', 'resolved', 'closed'])->default('pending');
        $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
        $table->string('report_token')->unique();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
