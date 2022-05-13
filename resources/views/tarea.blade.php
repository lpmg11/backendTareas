<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Tarea</title>
</head>
<body>
    <h1>Crear Tarea</h1>
    <form action="{{ route('tarea.store') }}" method="POST">
        {{ csrf_field() }}
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" id="titulo">
        <br>
        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        <br>
        <label for "fecha_inicio">Fecha de Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio">
        <br>
        <label for "fecha_final">Fecha de Fin</label>
        <input type="date" name="fecha_final" id="fecha_final">
        <br>
        <label for "prioridad">Prioridad</label>
        <select name="prioridad" id="prioridad">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        <label for "estado">Estado</label>
        <select name="estado" id="estado">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <br>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
