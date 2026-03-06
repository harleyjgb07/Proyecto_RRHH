<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta la migración
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_type');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->decimal('salary', 10, 2);
            $table->string('status');
            $table->foreignId('collaborator_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};