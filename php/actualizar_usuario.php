<form action="actualizar_usuario.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['name']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
    </div>
    <div class="form-group">
        <label for="destino">Destino:</label>
        <select class="form-control" id="destino" name="destino">
            <!-- Opciones del select -->
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
