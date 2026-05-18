<?php

class Alumno extends Modelo{

public function consultarAlumnoPorId($id_alumno){

    $consulta = "SELECT * FROM alumnos WHERE id_alumno=:id_alumno ";
    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':id_alumno', $id_alumno);
    $result->execute();
    return $result->fetch(PDO::FETCH_ASSOC);

}

public function consultarAlumnoPorUsuario($usuario){

    $consulta = "SELECT * FROM alumnos WHERE usuario=:usuario ";
    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':usuario', $usuario);
    $result->execute();
    return $result->fetch(PDO::FETCH_ASSOC);

}

public function verAlumnos() {

    $consulta = "SELECT * FROM alumnos ORDER BY apellidos ASC"; 
    $result = $this->conexion->prepare($consulta);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC); 
}



public function insertarUsuario($nombre, $apellidos, $usuario, $email, $pass, $telefono, $centro, $curso ) {
    $consulta = "INSERT INTO alumnos (nombre, apellidos, usuario, email, pass, telefono, centro, curso) VALUES (:nombre, :apellidos, :usuario, :email, :pass, :telefono, :centro, :curso)";
    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':nombre', $nombre);
    $result->bindParam(':apellidos', $apellidos);
    $result->bindParam(':usuario', $usuario);
    $result->bindParam(':email', $email);
    $result->bindParam(':pass', $pass);
    $result->bindParam(':telefono', $telefono);
    $result->bindParam(':centro', $centro);
    $result->bindParam(':curso', $curso);
    $result->execute();
    return $result;
}

public function eliminarUsuario($id_alumno){
    // Preparar la consulta SQL para eliminar un alumno por su ID
    $consulta = "DELETE FROM alumnos WHERE id_alumno = :id_alumno";
    $result = $this->conexion->prepare($consulta);
    
    // Asignar el valor del ID al parámetro de la consulta
    $result->bindParam(':id_alumno', $id_alumno, PDO::PARAM_INT);
    
    // Ejecutar la consulta
    $result->execute();
    
    // Retornar el resultado de la ejecución
    return $result;
}

public function actualizarUsuario($id_alumno, $nombre, $apellidos, $usuario, $email, $pass, $telefono, $centro, $curso ) {
    $consulta = "UPDATE alumnos SET nombre = :nombre , apellidos = :apellidos, usuario = :usuario, email = :email,
     pass = :pass, telefono = :telefono, centro = :centro, curso = :curso WHERE id_alumno = :id_alumno ";
    $result = $this->conexion->prepare($consulta);
    $result->bindParam(':id_alumno', $id_alumno);
    $result->bindParam(':nombre', $nombre);
    $result->bindParam(':apellidos', $apellidos);
    $result->bindParam(':usuario', $usuario);
    $result->bindParam(':email', $email);
    $result->bindParam(':pass', $pass);
    $result->bindParam(':telefono', $telefono);
    $result->bindParam(':centro', $centro);
    $result->bindParam(':curso', $curso);
    return $result->execute();
    

    

}


public function listarCursos() {

    $consulta = "SELECT * FROM cursos ORDER BY id_curso ASC"; 
    $result = $this->conexion->prepare($consulta);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_ASSOC); 
    
    // $result = $this->conexion->query($consulta);
        
        
    // return $result->fetchAll(PDO::FETCH_ASSOC);

}






}
?>