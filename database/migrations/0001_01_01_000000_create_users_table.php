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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable(); // SEO-friendly username
            $table->string('user_type')->default('User'); // User type
            $table->string('slug')->unique()->nullable(); // SEO-friendly URL slug
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();

            // Additional fields for e-commerce
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('country')->nullable();

            // Fields for social logins
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();

            // SEO-friendly and additional profile fields
            $table->text('bio')->nullable(); // User biography
            $table->string('twitter_url')->nullable(); // Twitter profile URL
            $table->string('linkedin_url')->nullable(); // LinkedIn profile URL
            $table->string('meta_title')->nullable(); // Custom meta title for user profile
            $table->text('meta_description')->nullable(); // Custom meta description for user profile

            // Additional fields for e-commerce enhancement
            $table->boolean('newsletter_subscription')->default(false); // Newsletter subscription
            $table->json('preferences')->nullable(); // User preferences
            $table->timestamp('last_login_at')->nullable(); // Last login time
            $table->json('purchase_history')->nullable(); // Purchase history
            $table->json('wishlist')->nullable(); // Wishlist items
            $table->integer('loyalty_points')->default(0); // Loyalty points
            $table->string('membership_tier')->nullable(); // Membership tier
            $table->string('alternate_email')->nullable(); // Alternate email
            $table->string('alternate_phone')->nullable(); // Alternate phone number
            $table->text('billing_address')->nullable(); // Billing address
            $table->text('shipping_address')->nullable(); // Shipping address
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
