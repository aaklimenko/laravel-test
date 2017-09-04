<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->text('template');
            $table->string('type');
            $table->boolean('is_active')->default(true);

            $table->index('type', 'is_active');
            $table->timestamps();
        });

        DB::table('email_templates')->insert([
            'template' =>  'User <b>{{$senderName}}</b> has send a feedback: <p>{{$feedback}}</p>',
            'type' => 'notifications.email.feedback'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_templates');
    }
}
