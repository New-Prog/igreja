<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensagensTable extends Migration
{
	public function up() {
		Schema::create ( 'mensagens', function (Blueprint $table) {
			$table->increments( 'id' );
			$table->string('nome')->nullable();
			$table->string('telefone')->nullable();
			$table->string('descricao')->nullable();
			$table->string('email')->nullable();
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('mensagens');
	}
}
