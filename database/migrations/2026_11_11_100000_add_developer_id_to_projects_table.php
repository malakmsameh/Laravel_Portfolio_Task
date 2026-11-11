<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('projects', 'developer_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->foreignId('developer_id')
                    ->nullable()
                    ->constrained('developers')
                    ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('projects', 'developer_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropConstrainedForeignId('developer_id');
            });
        }
    }
};
