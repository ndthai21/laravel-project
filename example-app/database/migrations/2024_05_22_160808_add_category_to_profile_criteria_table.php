<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToProfileCriteriaTable extends Migration
{
    public function up()
    {
        Schema::table('profile_criteria', function (Blueprint $table) {
            $table->string('category')->after('profile_id'); 
        });
    }

    public function down()
    {
        Schema::table('profile_criteria', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}
