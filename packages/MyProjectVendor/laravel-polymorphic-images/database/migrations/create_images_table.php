<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('images', function (Blueprint $t) {
            $t->id();

            $t->string('path');
            $t->morphs('imageable');

            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
