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
            $table->string('verified_by')->after('is_verified');
            $table->string('approved_by')->after('is_approve');
        });
    }

    public function down(): void
    {
        Schema::table('promisorris', function (Blueprint $table) {
            $table->dropColumn('verified_by');
            $table->dropColumn('approved_by');
        });
    }
};
