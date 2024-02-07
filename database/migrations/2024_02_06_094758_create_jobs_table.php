<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_region');
            $table->string('company');
            $table->string('job_type');
            $table->string('vacancy');
            $table->string('experience');
            $table->string('salary'); // Assuming you want to store salary as a decimal
            $table->string('gender');
            $table->string('application_deadline');
            $table->text('job_description');
            $table->text('responsibilities');
            $table->text('education_experience');
            $table->text('other_benefits');
            $table->string('image')->nullable(); // You can store image paths here, make it nullable
            $table->string('category');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
