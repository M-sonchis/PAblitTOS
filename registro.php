<?php include("header.php"); ?>
<section class="section">
  <h2>Formulario de Registro</h2>
  <form action="registroalumno.php" method="post" class="row g-3">
    <div class="col-md-4">
      <label class="form-label">DNI</label>
      <input type="text" name="dni" class="form-control" maxlength="8">
    </div>

    <div class="col-md-4">
      <label class="form-label">Nombres</label>
      <input type="text" name="nombres" class="form-control" maxlength="30">
    </div>

    <div class="col-md-4">
      <label class="form-label">Apellidos</label>
      <input type="text" name="apellidos" class="form-control" maxlength="50">
    </div>

    <div class="col-md-4">
      <label class="form-label">Fecha de Nacimiento</label>
      <input type="date" name="fec_nac" class="form-control">
    </div>

    <div class="col-md-8">
      <label class="form-label">Dirección</label>
      <input type="text" name="direccion" class="form-control" maxlength="100">
    </div>

    <div class="col-md-4">
      <label class="form-label">Teléfono</label>
      <input type="number" name="telefono" class="form-control">
    </div>

    <div class="col-md-4">
      <label class="form-label">Género</label>
      <select name="genero" class="form-select">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
      </select>
    </div>

    <div class="col-12">
      <button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
      <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
      <button type="submit" name="actualizar" class="btn btn-warning text-white">Actualizar</button>
      <button type="reset" class="btn btn-secondary">Limpiar</button>
    </div>
  </form>
</section>

<section class="section">
  <h2>Lista de Alumnos</h2>
  <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
      <thead class="table-dark">
        <tr>
          <th>DNI</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Fec. Nac</th>
          <th>Dirección</th>
          <th>Teléfono</th>
          <th>Género</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include("conexion.php");
        $sql = "SELECT * FROM Alumno";
        $result = sqlsrv_query($conn, $sql);

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>{$row['AlumDNI']}</td>";
          echo "<td>{$row['AlumNombres']}</td>";
          echo "<td>{$row['AlumApellidos']}</td>";
          echo "<td>" . ($row['AlumFecNac'] ? $row['AlumFecNac']->format('Y-m-d') : '') . "</td>";
          echo "<td>" . ($row['AlumDireccion'] ?? '') . "</td>";
          echo "<td>" . ($row['AlumTelefono'] ?? '') . "</td>";
          echo "<td>{$row['AlumGenero']}</td>";
          echo "</tr>";
        }
        sqlsrv_close($conn);
        ?>
      </tbody>
    </table>
  </div>
</section>

<?php include("footer.php"); ?>


