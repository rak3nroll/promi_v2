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
        Schema::table('promisorris', function (Blueprint $table) {
            $table->timestamp('date_verified')->after('is_verified');
            $table->timestamp('date_posted')->after('is_posted');
            $table->string('encoder');
            $table->string('district');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promisorris', function (Blueprint $table) {
            $table->dropColumn('date_verified');
            $table->dropColumn('date_posted');
            $table->dropColumn('encoder');
            $table->dropColumn('district');
        });
    }
};
