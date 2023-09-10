<div class="container mt-5">
    <h1>Añadir Nueva Tarea</h1>
    <form action="agregar" method="POST">
        <div class="mb-3">
            <label for="taskName" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="taskName" name="taskName" required>
        </div>
        <div class="mb-3">
            <label for="taskDescription" class="form-label">Descripción</label>
            <textarea class="form-control" id="taskDescription" name="taskDescription" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="taskPriority" class="form-label">Prioridad</label>
            <select class="form-select" aria-label="Default select example" id="taskPriority" name="taskPriority" required>
                <option selected>Seleccionar</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir Tarea</button>
    </form>
</div>
