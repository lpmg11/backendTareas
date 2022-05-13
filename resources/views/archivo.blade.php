<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Api guia</title>
</head>
<body>
    <form method="POST" action="{{ route('archivo.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="archivo">Archivo</label>
    <input type="file" name="archivo" required>
    <br>
    <label for="tarea">Tarea</label>
    <input type="number" name="tarea_id" required>
    <br>
    <input type="submit" value="Enviar">
    </form>
</body>
</html>
