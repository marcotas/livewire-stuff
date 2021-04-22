<?php

use App\Models\Group;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammingLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('programming_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('position')->default(0);
            $table->foreignIdFor(Group::class);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programming_languages');
    }
}
