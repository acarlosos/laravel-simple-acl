<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection( 'simple-acl' )
            ->create( 'roles', function ( Blueprint $table ) {
                $table->increments( 'id' );

                $table->unsignedSmallInteger( 'sort_index' )->nullable();

                $table->string( 'label' )->unique();
                $table->string( 'description' );

                $table->timestamps();
                $table->softDeletes();
            } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection( 'simple-acl' )->dropIfExists( 'roles' );
    }
}
