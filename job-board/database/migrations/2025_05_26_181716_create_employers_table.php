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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();

            $table->string('company_name');
            $table->foreignIdFor(\App\Models\User::class)
                ->nullable()
                ->constrained();

            $table->timestamps();
        });

        Schema::table('job_listings', function (Blueprint $table) {
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
        Schema::dropIfExists('employers');
    }
};
