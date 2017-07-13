<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require "vendor/autoload.php";

require_once "src/Remeras.php";
/**
 * @covers MisClases\Remeras
 * @covers MisClases\ORM
 */

final class RemerasTest extends TestCase
{
	public $Remeras;

	public function setUp()
	{
		$this->Remeras = new MisClases\Remeras();
	}

	public function testInsert()
	{
		$Columnas = array("Nombre",
			"Descripcion",
			"Link",
			"Image",
			"Talle",
			"Color",
			"Precio");

		$Valores = array("Nombre Test",
			"Descripcion Test",
			"Link Test",
			"Image Test",
			"Talle Test",
			"Color Test",
			"Precio Test");

		$this->Remeras->insert($Columnas, $Valores);
		$strAux = $this->Remeras->ultimo();
		$row = mysqli_fetch_object($strAux);

		$this->assertEquals("Nombre Test", $row->Nombre);
	}
}