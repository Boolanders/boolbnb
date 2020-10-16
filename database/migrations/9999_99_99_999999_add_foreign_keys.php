<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::table('visit', function (Blueprint $table) {
            
            $table -> foreign('apartment_id', 'apt-vis')
                   -> references('id')
                   -> on('apartment');
        });

        Schema::table('image', function (Blueprint $table) {
            
            $table -> foreign('apartment_id', 'apt-img')
                   -> references('id')
                   -> on('apartment');
        });

        Schema::table('messages', function (Blueprint $table) {
            
            $table -> foreign('apartment_id', 'apt-msg')
                   -> references('id')
                   -> on('apartment');
        });

        Schema::table('apartment_user', function (Blueprint $table) {
            
            $table -> foreign('apartment_id', 'apt-usr')
                   -> references('id')
                   -> on('apartment');
            $table -> foreign('user_id', 'usr-apt')
            -> references('id')
            -> on('user'); 
        });

        Schema::table('apartment_service', function (Blueprint $table) {
            
            $table -> foreign('apartment_id', 'apt-srv')
                   -> references('id')
                   -> on('apartment');
            $table -> foreign('service_id', 'srv-apt')
            -> references('id')
            -> on('service'); 
        });

        Schema::table('apartment_sponsorship', function (Blueprint $table) {
            
            $table -> foreign('apartment_id', 'apt-spr')
                   -> references('id')
                   -> on('apartment');
            $table -> foreign('sponsorship_id', 'spr-apt')
            -> references('id')
            -> on('sponsorships'); 
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        
        Schema::table('visit', function (Blueprint $table) {

            $table -> dropForeign('apt-vis');
        });

        Schema::table('image', function (Blueprint $table) {

            $table -> dropForeign('apt-img');
        });

        Schema::table('messages', function (Blueprint $table) {

            $table -> dropForeign('apt-msg');
        });

        Schema::table('apartment_user', function (Blueprint $table) {

            $table -> dropForeign('apt-usr');
            $table -> dropForeign('usr-apt');
        });

        Schema::table('apartment_service', function (Blueprint $table) {

            $table -> dropForeign('apt-srv');
            $table -> dropForeign('srv-apt');
        });

        Schema::table('apartment_sponsorship', function (Blueprint $table) {
            
            $table -> dropForeign('apt-spr');
            $table -> dropForeign('spr-apt');
        });
    }
}
