<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePresencasTables extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'presencas', function (Blueprint $table) {
			$table->integer ( 'fk_reuniao' )->unsigned ();
			$table->foreign ( 'fk_reuniao' )->references ( 'id' )->on ( 'reunioes' );
			$table->integer ( 'fk_membro' )->unsigned ();
			$table->foreign ( 'fk_membro' )->references ( 'id' )->on ( 'membros' );
			$table->boolean ( 'presente' )->default ( false );
			$table->timestamps ();
			$table->primary ( [ 
					'fk_reuniao',
					'fk_membro' 
			] );
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table ( 'presencas', function (Blueprint $table) {
			$table->dropForeign ( 'presencas_fk_membro_foreign' );
			$table->dropForeign ( 'presencas_fk_reuniao_foreign' );
			$table->dropColumn ( 'fk_membro' );
			$table->dropColumn ( 'fk_reuniao' );
		} );
	}
}
