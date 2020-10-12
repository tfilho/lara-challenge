<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;


class CreateProfilesCollection extends Migration
{

    protected $connection = 'mongodb';
    /**
     * @var string
     */
    protected $collection = 'profiles';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // I don't know why, but it was necessary put the down method here to drop the collection
        $this->down();

        Schema::connection($this->connection)->create($this->collection, function (Blueprint $collection) {
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)->drop($this->collection);
    }
}
