<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('phone');
            $table->string('email')->nullable()->index();
            $table->string('source')->nullable();
            $table->string('status')->default('new')->index();
            $table->foreignId('assigned_to')->constrained('users')->onDelete('cascade')->index();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}