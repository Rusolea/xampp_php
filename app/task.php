<?php

require_once './app/task.php';
require_once './app/db.php';

function showTasks() {
    require 'templates/header.php';

    require 'templates/form_alta.php';

    //otengo las tareas del modelo
    $tasks = getTasks();
    ?>

    

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Finalizada</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach($tasks as $task): ?>
        <tr>
            <td><?php echo $task->titulo ?></td>
            <td><?php echo $task->descripcion ?></td>
            <td><?php echo $task->prioridad ?></td>
            <td>
                <?php 
                if ($task->finalizada) {
                    echo '<span class="badge bg-success">Finalizada</span>'; // Clase de Bootstrap para tareas finalizadas
                } else {
                    echo '<span class="badge bg-danger">No Finalizada</span>'; // Clase de Bootstrap para tareas no finalizadas
                }
                ?>
            </td>
            <td><a href="eliminar/<?php echo $task->id; ?>" class="btn btn-danger">Eliminar</a></td>
            <?php if(!$task->finalizada): ?>
                <td><a href="finalizar/<?php echo $task->id; ?>" class="btn btn-success">Finalizar</a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</tbody>

  
</table>

    
    <?php
    require 'templates/footer.php';
}

//addTask()
function addTask() {

    //TODO validar los datos


    //obtener los datos del formulario
    $titulo = $_POST['taskName'];
    $descripcion = $_POST['taskDescription'];
    $prioridad = $_POST['taskPriority'];
    

    //cuando los tengo los inserto en la base de datos

    $success = insertTask($titulo, $descripcion, $prioridad);
    
    if($success) {
        //redirijo a la pagina de listar
        header('Location: ' . BASE_URL . 'listar');
    } else {
        echo "Error al insertar la tarea";
    }
   
}


//deleteTask($id)
function removeTask($id) {
    //elimino la tarea de la base de datos
    $success = deleteTask($id);
    if($success) {
        //redirijo a la pagina de listar
        header('Location: ' . BASE_URL . 'listar');
    } else {
        echo "Error al eliminar la tarea";
    }
   
}

function finishTask($id) {
    //elimino la tarea de la base de datos
    $success = finishTaskDb($id);
    if($success) {
        //redirijo a la pagina de listar
        header('Location: ' . BASE_URL . 'listar');
    } else {
        echo "Error al finalizar la tarea";
    }
   
}