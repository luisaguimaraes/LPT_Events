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
        $stored_procedure = "DROP PROCEDURE IF EXISTS 'sp_numparticipantesporevento';
        DELIMITER /
            CREATE PROCEDURE sp_numparticipantesporevento(int event_id)
            BEGIN
                select count(user_id) from event_user where event_user.event_id=event_id;
            END
            /;";

        \DB::unprepared($stored_procedure);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stored_procedure');
    }
};
