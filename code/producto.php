<?php 
 
// CLASE PRODUCTO CON SUS VARIABLES Y FUNCIONES PARA INSERTAR-DEVOLVER VALORES

class Producto {
 
    private $id;
    private $nombre;
    private $autor;
	private $precio;
	private $descripcion;
    private $img;

    /*function __construct( $id, $nombre, $autor, $precio, $descripcion, $img ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->autor = $autor;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->img = $img;
    }*/

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
	    return $this->nombre;
	}
 
	public function setNombre($nombre) {
		$this->nombre = $nombre;
    }
    
    public function getAutor() {
        return $this->autor;
    }
     
    public function setAutor($autor) {
        $this->autor = $autor;
    }
 
	public function getPrecio() {
		return $this->precio;
	}
 
	public function setPrecio($precio) {
		$this->precio = $precio;
	}

	public function getDescripcion() {
		return $this->descripcion;
	}
 
	public function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	public function getImg() {
		return $this->img;
	}
 
	public function setImg($img){
		$this->img = $img;
	}	

    // FUNCION PARA PARA PINTAR LOS PRODUCTOS
    /*function paintCard() {

        echo '<div class="card col-xl-3 col-md-4 col-sm-6 col-12 mb-3" style="width: 100%;">' . 
                '<img class="card-img-top" src="' . $this->getImg() . '" alt="Not Found Image">' . 
                '<hr/>' . 
                '<div class="card-body">' .
                    '<h6 class="card-title">NAME: ' . $this->getNombre() . '</h6>' . 
                    '<p class="card-text">'. $this->getAutor() .'</p>'.
                    '<p class="card-text">'. $this->getDescripcion() .'</p>'.
                    '<div class="form-group row">' .
                        '<label for="quantity" class="col-6 col-form-label text-nowrap">Price: ' . $this->getPrecio() . ' €</label>' .
                        '<div class="col-6">' . 
                            '<input type="number" class="form-control" id="quantity' . $this->getID() . '" value="0" min="0" max="999">' . 
                        '</div>' . 
                    '</div>' .
                    '<button onclick="addToCart(' . $this->getID() . ')" class="btn btn-primary">ADD TO CART</button>' .
                '</div>' .
            '</div>';
    }*/
}

?>