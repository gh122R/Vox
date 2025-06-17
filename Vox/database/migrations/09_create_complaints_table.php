<?php

use App\Models\Department;
use App\Models\ProblemType;
use App\Models\Status;
use App\Models\User;
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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Status::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(ProblemType::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Department::class)->constrained()->cascadeOnDelete();
            $table->text('description');
            $table->text('resolution')->nullable();
            $table->boolean('anonymous')->default(false);
            $table->tinyInteger('feedback_rating')->default(0);
            $table->date('deadline')->nullable();
            $table->timestamp('taken_at')->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('feedback_rating');
            $table->index('anonymous');
            $table->index('deadline');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
