
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_settings', function (Blueprint $table) {
            $table->id();

            $table->string('eyebrow')->default('Premium Medical Apparel');

            $table->string('heading_line_1')->default('Comfort.');
            $table->string('heading_line_2')->default('Style.');
            $table->string('heading_line_3')->default('Professionalism.');

            $table->text('description')->nullable();

            $table->string('button_text')->default('Shop Now');
            $table->string('button_url')->default('/shop');

            $table->string('feature_one')->default('Convenient Delivery');
            $table->string('feature_two')->default('Secure Shopping');

            $table->string('image_path')->nullable();
            $table->string('image_alt')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_settings');
    }
};
