<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('reponses', function (Blueprint $table) {
            $table->float('value', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('reponses', 'value'))
        {
            Schema::table('reponses', function (Blueprint $table)
            {
                $table->dropColumn('value');
            });
        }
    }
}
