<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('profile_information', function (Blueprint $table) {
            $table->string('firstname')->nullable()->change();
            $table->string('surname')->nullable()->change();
        });
    }

};
