<?php 

require "../utils/autoload.php";

    class UsuarioModelo extends Modelo{
        public $Id;
        public $Nombre;
        public $NombreCompleto;
        public $Password;
        

        public function __construct($id=""){
            parent::__construct();
            if($id != ""){
                $this -> id = $id;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> Id == NULL) return($this -> insertar());
            else return ($this -> actualizar());
        }

        private function insertar(){
            $sql = "INSERT INTO usuario (username,complete_name,password) VALUES (
            '" . $this -> Nombre . "',
            '" . $this -> NombreCompleto . "',
            '" . $this -> hashearPassword($this -> Password) . "')";

            return $this -> llamarConexionDevuelveError($sql);
        }

        private function hashearPassword($password){
            return password_hash($password,PASSWORD_DEFAULT);
        }

        private function actualizar(){
            $sql = "UPDATE usuario SET
            username = '" . $this -> Nombre . "',
            complete_name = '" . $this -> NombreCompleto . "',
            password = '" . $this -> hashearPassword($this -> Password) . "'
            WHERE id = " . $this -> Id;
            return $this -> llamarConexionDevuelveError($sql);
        }

        public function Eliminar(){
            $sql = "DELETE FROM publicaciones WHERE autor = '" . $this -> Usuario . "';";
            $errorBajaPublicaciones = $this -> llamarConexionDevuelveError($sql);
            $sql = "DELETE FROM usuario WHERE id = " . $this ->Id . ";";
            $errorBajaUsuario = $this -> llamarConexionDevuelveError($sql);
            if ($errorBajaPublicaciones AND $errorBajaUsuario) return true;
            return false;
        }

        public function Obtener(){
            $sql = "SELECT * FROM usuario WHERE id = " . $this ->id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Nombre = $fila['username'];
            $this -> NombreCompleto = $fila['complete_name'];
            return $fila;
        }

        public function ObtenerID(){
            $sql = "SELECT id FROM usuario WHERE username = '" . $this -> Nombre . "'";
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            $Id = $fila['id'];
            return $Id;
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM usuario";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            $resultado = array();
            foreach($filas as $fila){
                $p = new UsuarioModelo();
                $p -> Id = $fila['id'];
                $p -> Nombre = $fila['username'];
                $p -> NombreCompleto = $fila['complete_name'];
                array_push($resultado,$p);
            }
            return $resultado;
        }

        public function Autenticar(){
            $sql = "SELECT * FROM usuario WHERE username = '" . $this -> Nombre . "'";
            $resultado = $this -> conexionBaseDeDatos -> query($sql);
            if($resultado -> num_rows == 0) {
                return false;
            }

            $fila = $resultado -> fetch_all(MYSQLI_ASSOC)[0];
            return $this -> compararPasswords($fila['password']);
        }

        private function compararPasswords($passwordHasheado){
            return password_verify($this -> Password, $passwordHasheado);
        }

        private function llamarConexionDevuelveError($sql){
            $this -> conexionBaseDeDatos -> query($sql);
            if ($this -> conexionBaseDeDatos -> error_list[0]['errno'] == 0) return true;
            else return false;
        }

    }