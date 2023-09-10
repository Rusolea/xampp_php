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
                    <td><?php echo $task->finalizada ?></td>
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
    $finalizada = 0;

    //cuando los tengo los inserto en la base de datos

    insertTask($titulo, $descripcion, $prioridad, $finalizada);

    header('Location: ' . BASE_URL . 'listar');
    
}