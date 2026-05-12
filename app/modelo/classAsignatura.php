<?php

class Asignatura extends Modelo{

    //INSERTAR EN LAS TABLAS DE LAS ASIGNATURAS

    //funcion generica

    public function insertarRecurso($tabla, $bloque, $tema, $recurso) {
        // Preparar la consulta SQL
        $consulta = "INSERT INTO $tabla (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
        
        // Preparar la consulta para ser ejecutada
        $result = $this->conexion->prepare($consulta);
        
        // Vincular los parámetros
        $result->bindParam(':bloque', $bloque);
        $result->bindParam(':tema', $tema);
        $result->bindParam(':recurso', $recurso);
        $nivel = 1; // Valor fijo para el nivel
        $result->bindParam(':nivel', $nivel);
        
        // Ejecutar la consulta
        $result->execute();
        return $result;
    }
    



    //funciones especificas

    // public function insertarMatematicas($bloque, $tema, $recurso, $nivel) {
    //     $consulta = "INSERT INTO matematicas (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->execute();
    //     return $result;
    // }

    // public function insertarCastellano($bloque, $tema, $recurso, $nivel) {
    //     $consulta = "INSERT INTO castellano (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->execute();
    //     return $result;
    // }
    // public function insertarFisica($bloque, $tema, $recurso , $nivel) {
    //     $consulta = "INSERT INTO fisica (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->execute();
    //     return $result;
    // }
    // public function insertarFisicaQuimica($bloque, $tema, $recurso , $nivel) {
    //     $consulta = "INSERT INTO fisicaquimica (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->execute();
    //     return $result;
    // }
    // public function insertarHistoria($bloque, $tema, $recurso , $nivel) {
    //     $consulta = "INSERT INTO historia (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->execute();
    //     return $result;
    // }
    // public function insertarIngles($bloque, $tema, $recurso , $nivel) {
    //     $consulta = "INSERT INTO ingles (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->execute();
    //     return $result;
    // }
    // public function insertarQuimica($bloque, $tema, $recurso , $nivel) {
    //     $consulta = "INSERT INTO quimica (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->execute();
    //     return $result;
    // }
    // public function insertarValenciano($bloque, $tema, $recurso , $nivel) {
    //     $consulta = "INSERT INTO valenciano (bloque, tema, recurso, nivel) VALUES (:bloque, :tema, :recurso, :nivel)";
    //     $result = $this->conexion->prepare($consulta);
    //     $result->bindParam(':bloque', $bloque);
    //     $result->bindParam(':tema', $tema);
    //     $result->bindParam(':nivel', $nivel);        
    //     $result->bindParam(':recurso', $recurso);        
    //     $result->execute();
    //     return $result;
    // }

    //LISTAR LAS TABLAS 

    
    public function listarMatematicas() {
        $consulta = "SELECT * FROM matematicas ORDER BY bloque ASC";
        $result = $this->conexion->query($consulta);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarAsignatura($tabla) {
      
        // Preparar la consulta SQL
        $consulta = "SELECT * FROM $tabla ORDER BY bloque ASC";
        
        // Ejecutar la consulta
        $result = $this->conexion->query($consulta);
        
        // Retornar los resultados en forma de arreglo asociativo
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    

    //eliminar registros

    public function eliminarMatematicas($id_matematicas) {

        $consulta = "DELETE FROM matematicas WHERE id_matematicas = :id_matematicas";
        $result = $this->conexion->prepare($consulta);
        $result->bindParam(':id_matematicas', $id_matematicas);
        return $result->execute();
    }
    
    public function eliminarRecurso($tabla, $idCampo, $idValor) {
      
        
             // Preparar la consulta SQL
        $consulta = "DELETE FROM $tabla WHERE $idCampo = :idValor";
        
        // Preparar la consulta para ser ejecutada
        $result = $this->conexion->prepare($consulta);
        
        // Vincular el parámetro
        $result->bindParam(':idValor', $idValor);
        
        // Ejecutar la consulta
        return $result->execute();
    }

    public function modificarRecurso($tabla, $idCampo, $idValor, $datos) {
      
        // Construir la parte SET de la consulta SQL
        $setPart = [];
        foreach ($datos as $campo => $valor) {
            $setPart[] = "`$campo` = :$campo";
        }
        $setQuery = implode(", ", $setPart);
        
        // Preparar la consulta SQL
        $consulta = "UPDATE $tabla SET $setQuery WHERE $idCampo = :idValor";
        
        // Preparar la consulta para ser ejecutada
        $result = $this->conexion->prepare($consulta);
        
        // Vincular los parámetros de los datos a actualizar
        foreach ($datos as $campo => $valor) {
            $result->bindParam(":$campo", $datos[$campo]);
        }
        
        // Vincular el parámetro del id
        $result->bindParam(':idValor', $idValor);
        
        // Ejecutar la consulta
        return $result->execute();
    }
    




}





?>