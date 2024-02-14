<?php

use App\Models\Employer;
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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignIdFor(User::class)->nullable()->constrained(); //every user can own a company and add job offers, no every user is an employer
            $table->timestamps();
        });

        Schema::table('jobs', function(Blueprint $table){
            $table->foreignIdFor(Employer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //first remove the foreign key on jobs table then remove the employee table
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeignIdFor(Employer::class);
        });

        Schema::dropIfExists('employers');
    }
};
