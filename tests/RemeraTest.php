<?php
use \PHPUnit\Framework\TestCase;

require_once "src/Remera.php";
require_once "src/DolarCotizacion.php";
/**
 * @covers MisClases\Remera
 */

final class RemeraTest extends TestCase
{
	public $remera;
	const ID = 1;
	const NOMBRE = 'NOMBRE';
	const DESCRIPCION = 'DESCRIPCION';
	const LINK = 'LINK';
	const IMAGE = 'IMAGE';
	const TALLE = 'TALLE';
	const COLOR = 'COLOR';
	const PRECIO = 'PRECIO';

	const DIRECTORIO = 'DIRECTORIO/';


	/*
     * @covers MisClases\remera::showRow
	 * @covers MisClases\DolarCotizacion::__construct
	 * @covers MisClases\Image::__construct
	 * @covers MisClases\Image::getImg
	 * @covers MisClases\Image::getUrl
	 * @covers MisClases\Image::setDirectorio
	 * @covers MisClases\Image::setFileName
	 */
	public function testShowRow()
	{
		$mockDolarCotizacion = $this->getMockBuilder(
			MisClases\DolarCotizacion::class)
            ->disableOriginalConstructor()
			->setMethods(array('ConvertirOficial'))
			->getMock();
		
		$mockDolarCotizacion->expects($this->once())
		    ->method('ConvertirOficial')
		    ->with(10)
    		->will($this->returnValue('150'));

       	$remera = new MisClases\Remera('1', 'Pequeña', 'Una remera pequeña',
				'1', '1.jpg', 's', 'rojo', 10, $mockDolarCotizacion);
    	$resultado = "<tr><td>1</td><td>Pequeña</td><td>Una remera pequeña</td><td><a href='1'>1</a></td><td><img src=\"https://http://local.poo.com/DIRECTORIO/1.jpg\" height='120'width='120' ></img></td><td>s</td><td>rojo</td><td>150</td></tr>";
		
		$this->assertEquals($remera->showRow(self::DIRECTORIO), $resultado);
	}

}
