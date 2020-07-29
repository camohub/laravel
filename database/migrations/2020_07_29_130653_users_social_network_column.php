<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersSocialNetworkColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function (Blueprint $table) {

			$table->dropIndex('users_email_unique');
			$table->unique(['email', 'name']);

			if (!Schema::hasColumn('users', 'social_network')) {
				$table->string('social_network', 30)->nullable();
			}
			if (!Schema::hasColumn('users', 'social_network_params')) {
				$table->longText('social_network_params')->nullable();
			}
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
