<?php 
/* Productos */
namespace MisClases;

require_once "Image.php";
require_once "DolarCotizacion.php";


class Remera
{
    protected $id;
    protected $nombre;
    protected $description;
    protected $link;
    protected $precio;
    protected $image;
    protected $talle;
    protected $color;
    protected $DolarCotizacion;


    public function __construct($id, $nombre, $description, $link, $image, 
                                $talle, $color, $precio, 
                                DolarCotizacion $DolarCotizacion)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->description = $description;
        $this->link = $link;
        $this->image = $image;
        $this->talle = $talle;
        $this->color = $color;
        $this->precio = $precio;
        $this->DolarCotizacion = $DolarCotizacion;
    }


    private function showRow($directorio)
    {
        $img = new Image();
        $img->setDirectorio($directorio);
        $img->setFileName($this->image);
        $out = sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td></tr>",
            $this->id,
            $this->nombre,
            $this->description,
            "<a href='$this->link'>$this->link</a>",
            $img->getImg(),
            $this->talle,
            $this->color,
            $this->DolarCotizacion->ConvertirOficial($this->precio)
        );
        return $out;
    }


    public function AdminshowRow($directorio)
    {
        $img = new Image();
        $img->setDirectorio($directorio);
        $img->setFileName($this->image);
        $out = sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td><td>%s</td></tr>",
        $this->id,
        $this->nombre,
        $this->description,
        "<a href='$this->link'>$this->link</a>",
        $img->getImg(),
        $this->talle,
        $this->color,
        $this->DolarCotizacion->ConvertirOficial($this->precio),
        "<a href='editar_remera.php?id=" . $this->id . "'>Editar</a>",
        "<a href='eliminar_remera.php?id=" . $this->id . "'>Eliminar</a>");
        return $out;
    }
}

