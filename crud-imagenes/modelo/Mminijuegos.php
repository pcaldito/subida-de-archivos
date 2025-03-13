<?php
require_once("conectar.php");

class MMinijuegos {
    private $conexion;

    public function __construct() {
        $conectar = new Conectar("localhost", "minijuegos", "root", ""); 
        $this->conexion = $conectar->conexion();
    }

    public function listar_minijuegos() {
        $sql = "SELECT * FROM minijuegos";
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }

    public function ver_imagen() {
        if(isset($_GET['idjuego'])){
            $id=$_GET['idjuego'];
        }
        $sql = "SELECT * FROM minijuegos WHERE idjuego = $id";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_assoc();
    }

    public function nombre_anadir() {
        if(isset($_GET['idjuego'])){
            $id=$_GET['idjuego'];
        }
        $sql = "SELECT * FROM minijuegos WHERE idjuego = $id";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_assoc();
    }

    public function subir_imagen($idjuego, $nombre_imagen) {
        $sql = "UPDATE minijuegos SET imagen = '$nombre_imagen' WHERE idjuego = $idjuego";

        if ($this->conexion->query($sql)) {
            return true; 
        } else {
            return false; 
        }
    }
    

    public function eliminar_imagen($idjuego) {
        $sql = "SELECT imagen FROM minijuegos WHERE idjuego = $idjuego";
        $resultado = $this->conexion->query($sql);
            
        if ($resultado && $resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $nombre_imagen = $fila['imagen'];
    
            $directorioDestino = "imagenes/";
            $rutaImagen = $directorioDestino . $nombre_imagen;
 
            if (file_exists($rutaImagen)) {
                unlink($rutaImagen); 
            }

            $sql2 = "UPDATE minijuegos SET imagen = NULL WHERE idjuego = $idjuego";
            if ($this->conexion->query($sql2)) {
                return true;
            } else {
                return false; 
            }
        } else {
            return false; 
        }
    }
}
    
?>
