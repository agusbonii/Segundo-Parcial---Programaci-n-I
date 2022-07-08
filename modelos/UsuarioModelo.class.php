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

            $this -> conexionBaseDeDatos -> query($sql);
            if ($this -> conexionBaseDeDatos -> error_list[0]['errno'] == 0) return true;
            else return false;
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
            $this -> conexionBaseDeDatos -> query($sql);
            if ($this -> conexionBaseDeDatos -> error_list[0]['errno'] == 0) return true;
            else return false;
        }

        public function ObtenerID(){
            $sql = "SELECT id FROM usuario WHERE username = '" . $this -> Nombre . "'";
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            $Id = $fila['id'];
            return $Id;
        }
        
        public function Obtener(){
            $sql = "SELECT * FROM usuario WHERE id = " . $this ->Id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];
            
            $resultado = array();
            $resultado['Id'] = $fila['id'];
            $resultado['Nombre'] = $fila['username'];
            $resultado['NombreCompleto'] = $fila['complete_name'];
            
            array_push($resultado);
            
            return $resultado;
        }


        public function Eliminar(){
            $sql = "DELETE FROM usuario WHERE id = " . $this ->Id;
            $this -> conexionBaseDeDatos -> query($sql);
            if ($this -> conexionBaseDeDatos -> error_list[0]['errno'] == 0) return true;
            else return false;
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

    }