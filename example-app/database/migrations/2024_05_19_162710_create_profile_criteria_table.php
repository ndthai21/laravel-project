<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_criteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->onDelete('cascade');
            $table->string('criterion')->nullable();
            $table->decimal('score', 5, 2)->nullable();
            $table->decimal('score2', 5, 2)->nullable();
            $table->decimal('average', 5, 2)->nullable();
            $table->string('school_year')->nullable();
            $table->string('file_path')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('confirmed_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_criteria');
    }
}
