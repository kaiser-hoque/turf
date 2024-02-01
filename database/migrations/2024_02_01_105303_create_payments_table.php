<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;  // Add this import

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('method');
            $table->timestamps();
        });
        DB::table('payments')-> insert([
            [
                'method' => 'cash',
                'created_at' => Carbon::now()
            ],
            [
                'method' => 'bkash',
                'created_at' => Carbon::now()
            ],
            [
                'method' => 'paypal',
                'created_at' => Carbon::now()
            ],
            [
                'method' => 'strip',
                'created_at' => Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
