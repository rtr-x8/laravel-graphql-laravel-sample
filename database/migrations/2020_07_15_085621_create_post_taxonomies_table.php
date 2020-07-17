<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTaxonomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_taxonomies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('post_id')->unsigned();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');


                $table->bigInteger('taxonomy_id')->unsigned();

                $table->foreign('taxonomy_id')
                    ->references('id')
                    ->on('taxonomies')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_taxonomies', function (Blueprint $table) {
            $table->dropForeign('post_taxonomies_taxonomy_id_foreign');
            $table->dropForeign('post_taxonomies_post_id_foreign');
        });
    }
}
