<?php
 
    class Conectar {
        private $host="localhost";
        private $dbname="minijuegos";
        private $username="root";
        private $password="";

        public function __construct($host, $dbname, $username, $password) {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;
        }

        public function conexion() {
            $this->conexion = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            } else {
                return $this->conexion;
            }
        }
    }

?>