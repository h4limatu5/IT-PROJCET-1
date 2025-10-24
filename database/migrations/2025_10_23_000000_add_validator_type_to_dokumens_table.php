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
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropForeign(['validated_by']);
            $table->enum('validator_type', ['kaprodi', 'dosen'])->nullable()->after('validated_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            $table->dropColumn('validator_type');
            $table->foreignId('validated_by')->nullable()->constrained('kaprodis')->onDelete('set null');
        });
    }
};
