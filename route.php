<?php
require_once 'app/task.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // default action
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// listar todas las tareas de la base de datos showTasks()
// agregar una tarea a la base de datos addTask()

//parse la accion para separar accion real de parametros
$params = explode('/', $action);

//determina que camino seguir según la acción
switch($params[0]) {
    case 'listar':
        showTasks();
        break;
    case 'agregar':
        addTask();
        break;
    default:
        echo '404 - Página no encontrada';
        break;
}
