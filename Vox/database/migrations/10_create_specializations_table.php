<?php

use App\Models\Department;
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
        Schema::create('specializations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_specializations');
    }
};
