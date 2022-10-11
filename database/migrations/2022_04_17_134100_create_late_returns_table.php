<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('late_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_id');
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('borrow_id');
            $table->integer('late_return_fines');
            $table->integer('overdue_days')->nullable();
            $table->integer('payment')->nullable();
            $table->date('date_of_payment')->nullable();
            $table->timestamps();

            $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('cascade');

            // $table->foreignId('borrower_id')->constrained()->cascadeOnDelete();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('borrow_id')->references('id')->on('borrows')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('late_returns');
    }
};
