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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('text')->comment('متن سوال');
            $table->foreignId('pole_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('q1')->comment('متن گزینه 1');
            $table->integer('q1point')->comment('امتیاز گزینه ی اول');
            $table->string('q2')->comment('متن گزینه 2');
            $table->integer('q2point')->comment('امتیاز گزینه ی دوم');
            $table->string('q3')->nullable();
            $table->integer('q3point')->nullable();
            $table->string('q4')->nullable();
            $table->integer('q4point')->nullable();
            $table->string('q5')->nullable();
            $table->integer('q5point')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
