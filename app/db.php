<?php

function getConnection() {
    //abrimos la conexion a la base de datos
    //dbname es el nombre de la base de datos
    $db = new PDO('mysql:host=localhost;'.'dbname=db_tareas;charset=utf8', 'root', '');
    return $db;
}

/**
 * obteiene y devuelve todas las tareas de la base de datos
 */

function getTasks() {
    //abrimos la conexion a la base de datos usando la funcion getConnection()
    //dbname es el nombre de la base de datos
    $db = getConnection();
    //enviamos la consulta y obtenemos las tareas
    //FROM tareas es la tabla de la base de datos
    $sentencia = $db->prepare("SELECT * FROM tareas");
    $sentencia->execute();
    //obtengo todos los daos que arroja la query
    $tasks = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $tasks;

    //3 mostrar las tareas obtenidas

    //4 cerrar la conexion


}

/**
 * inserta una tarea en la base de datos
 */
function insertTask($titulo, $descripcion, $prioridad){
    $db = getConnection();
    //preparo la sentencia para insertar en la base de datos y prevengo inyeccion sql con ?, ?, ?,
    //bindvalue es para asignarle un valor a cada ?
    $sentencia = $db->prepare("INSERT INTO tareas(titulo, descripcion, prioridad) VALUES(?,?,?)");  
    //ejecuto la sentencia
    $sentencia->execute(array($titulo, $descripcion, $prioridad));
    //el id es autoincremental, no lo inserto

    //inserto la tarea en la base de datos
    //devuelvo el id de la tarea insertada para verificar que se inserto correctamente
    $id = insertTask($titulo, $descripcion, $prioridad);
    echo "Tarea insertada con exito";
    if($id > 0) {
        //redirijo a la pagina de listar
        header('Location: ' . BASE_URL . 'listar');
    } else {
        echo "Error al insertar la tarea";
    }


}