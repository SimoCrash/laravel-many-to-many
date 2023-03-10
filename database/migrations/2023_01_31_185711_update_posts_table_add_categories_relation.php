<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTableAddCategoriesRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //crea la colonna della tabella esterna: category_id
            $table->unsignedBigInteger('category_id')->after('id')->default(1);

            //crea la relazione tra le tabelle
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //eliminare la relazione
            $table->dropForeign(['category_id']);

            //eliminare la colonna
            $table->dropColumn('category_id');
        });
    }
}
