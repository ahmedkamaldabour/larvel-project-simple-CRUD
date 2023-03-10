<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
//php artisan make:migration add_description_column_to_posts_table
	public function up() {
		Schema::table('posts', function (Blueprint $table) {
			$table->string('description', 255);
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('posts', function (Blueprint $table) {
			//
		});
	}
};
