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
        Schema::table('news_mods', function (Blueprint $table) {
            $table->dropColumn('n_author');
            $table->foreignId('n_author_id')
                ->after('n_content')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_mods', function (Blueprint $table) {
            $table->string('n_author')->after('n_content');
            $table->dropForeign(['n_author_id']);
            $table->dropColumn('n_author_id');
        });
    }
};
