<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMediaTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * TODO:
     *  - test if needed and working (should be good)
     */
    public function up()
    {
//        DB::unprepared('CREATE TRIGGER add_media_trigger AFTER INSERT ON `media`
//        FOR EACH ROW
//            BEGIN
//
//                UPDATE `galleries` SET galleries.header_image_id = NEW.id where id = NEW.model_id;
//            END#');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        DB::unprepared("DROP TRIGGER `add_media_trigger`");
    }
}
