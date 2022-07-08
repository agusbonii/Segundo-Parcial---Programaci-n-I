<?php 

require "../utils/autoload.php";

    class PostBlogModelo extends Modelo{
        public $Id;
        public $Autor;
        public $FechaYHora;
        public $Cuerpo;
        

        public function __construct($id=""){
            parent::__construct();
            if($id != ""){
                $this -> id = $id;
                $this -> Obtener();
            }
        }

        public function Guardar(){
            if($this -> Id == NULL) return $this -> insertar();
            else return $this -> actualizar();
        }

        private function insertar(){
            $sql = "INSERT INTO publicaciones (autor,fechaYHora,cuerpo) VALUES (
            '" . $this -> Autor . "',
            '" . $this -> FechaYHora . "',
            '" . $this -> Cuerpo . "')";
            return $this -> llamarConexionDevuelveError($sql);
        }

        private function actualizar(){
            $sql = "UPDATE publicaciones SET
            fechaYHora = '" . $this -> FechaYHora . "',
            cuerpo = '" . $this -> Cuerpo . "'
            WHERE id = " . $this -> Id;
            return $this -> llamarConexionDevuelveError($sql);
        }

        public function Eliminar(){
            $sql = "DELETE FROM publicaciones WHERE id = " . $this ->Id . " AND autor = '" . $this -> Autor . "';";
            return $this -> llamarConexionDevuelveError($sql);
        }

        public function Obtener(){
            $sql = "SELECT * FROM publicaciones WHERE id = " . $this -> Id;
            $fila = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC)[0];

            $this -> Id = $fila['id'];
            $this -> Autor = $fila['autor'];
            $this -> FechaYHora = $fila['fechaYHora'];
            $this -> Cuerpo = $fila['cuerpo'];
        }

        public function ObtenerPublicacionAutores(){
            $sql = "SELECT * FROM publicaciones WHERE autor = '" . $this -> Autor . "'";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            return self::insertarDatosDentroDeArray($filas);
        }

        public function ObtenerTodos(){
            $sql = "SELECT * FROM publicaciones";
            $filas = $this -> conexionBaseDeDatos -> query($sql) -> fetch_all(MYSQLI_ASSOC);

            return self::insertarDatosDentroDeArray($filas);
        }

        private function insertarDatosDentroDeArray($filas){
            $resultado = array();
            foreach($filas as $fila){
                $p = new PostBlogModelo();
                $p -> Id = $fila['id'];
                $p -> Autor = $fila['autor'];
                $p -> FechaYHora = $fila['fechaYHora'];
                $p -> Cuerpo = $fila['cuerpo'];
                array_push($resultado,$p);
            }
            return $resultado;
        }

        private function llamarConexionDevuelveError($sql){
            $this -> conexionBaseDeDatos -> query($sql);
            if ($this -> conexionBaseDeDatos -> error_list[0]['errno'] == 0) return true;
            else return false;
        }

    }