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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('platform')->default('amazon'); // amazon, walmart, ebay, tiktok, shopify, noon
            $table->string('subtitle')->nullable();
            $table->decimal('price_usd', 10, 2)->default(699.00);
            $table->decimal('original_price_usd', 10, 2)->nullable();
            $table->string('discount_badge')->nullable(); // "Save 40%!"
            $table->json('features')->nullable(); // array of features
            $table->boolean('is_popular')->default(false);
            $table->string('badge_text')->nullable(); // "MOST POPULAR 🔥"
            $table->string('cta_text')->default('Launch My Store');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
