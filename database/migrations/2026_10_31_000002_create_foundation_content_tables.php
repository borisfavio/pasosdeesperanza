<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('icon')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->longText('content')->nullable();
            $table->string('image_url')->nullable();
            $table->date('published_at')->nullable();
            $table->boolean('is_published')->default(false);
            $table->foreignId('program_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->text('bio')->nullable();
            $table->string('photo_url')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        Schema::create('foundation_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('foundation_settings');
        Schema::dropIfExists('staff');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('programs');
    }
};
