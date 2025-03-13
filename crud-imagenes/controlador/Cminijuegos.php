<?php
    require_once("modelo/Mminijuegos.php");
    class CMinijuegos{

        public function listar_minijuegos(){
            $objM=new MMinijuegos;
            $resultado=$objM->listar_minijuegos();
            include("vista/minijuegos.php");
        }

        public function ver_imagen(){
            $objM=new MMinijuegos;
            $resultado=$objM->ver_imagen();
            include("vista/imagen_ver.php");
        }

        public function nombre_anadir(){
            $objM=new MMinijuegos;
            $resultado=$objM->nombre_anadir();
            include("vista/form_anadir_imagen.php");
        }

        public function eliminar_imagen() {
            if (isset($_GET['idjuego'])) {
                $idjuego = $_GET['idjuego'];
            
                $objM = new MMinijuegos();
                
                if ($objM->eliminar_imagen($idjuego)) {
                    echo "Imagen eliminada correctamente.";
                    echo '<a href="listaMinijuegos.php">Volver</a>';
                } else {
                    echo "Error al eliminar la imagen.";
                }
            } else {
                echo "No se ha proporcionado el ID del juego.";
            }
        }
        

        public function subir_imagen() {
            $objM = new MMinijuegos();

            if (isset($_FILES['imagen']) && isset($_POST['idjuego'])) {
                $idjuego = intval($_POST['idjuego']); 
                $archivo = $_FILES['imagen'];
                $nombreArchivo = basename($archivo['name']);
                $tamanoArchivo = $archivo['size'];
                $tipoArchivo = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));
                $directorioDestino = "imagenes/"; 
                $rutaDestino = $directorioDestino . $nombreArchivo;
    
                $tiposPermitidos = ['jpg', 'jpeg', 'gif'];
                $tamanoMaximo = 2 * 1024 * 1024; 
        
                if (!in_array($tipoArchivo, $tiposPermitidos)) {
                    echo "Error: Solo se permiten archivos JPG, JPEG y GIF.";
                    return;
                }
        
                if ($tamanoArchivo > $tamanoMaximo) {
                    echo "Error: El archivo supera los 2MB.";
                    return;
                }

                if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                    if ($objM->subir_imagen($idjuego, $nombreArchivo)) {
                        echo "Imagen subida y registrada correctamente.";
                        echo '<a href="listaMinijuegos.php">Volver</a>';
                    } else {
                        echo "Error al guardar la imagen en la base de datos.";
                    }
                } else {
                    echo "Error al subir la imagen al servidor.";
                }
            } else {
                echo "No se recibió ninguna imagen o ID de juego.";
            }
        }
        
    }
?>