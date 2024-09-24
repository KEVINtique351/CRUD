<?php

require_once "config/Conexion.php";

$conexionDam = new Conexion();
$conexion = $conexionDam->conectar();

$sql = $conexion->query("SELECT * FROM pacientes
                      INNER JOIN tiposdocumentos ON pacientes.id_tipoDocumento = tiposdocumentos.id_tipoDocumento
                      INNER JOIN estado_atencion ON pacientes.id_estado = estado_atencion.id_estado ");

$pacientes = $sql->fetchAll(PDO::FETCH_ASSOC);
$sql->execute();

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REGISTRO PACIENTES</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <br>
  <div class="container">
    <div class="row">
      <h2 class="text-center bg-dark text-white py-3">REGISTRO PACIENTES</h2>
      <div class="col-12">
        <div class="card text-left">
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-12 ">
                <a href="formularios/agregarForm.php" class="btn btn-primary">Nuevo registro</a>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table table-dark">
                    <thead>
                      <tr class="font-weight-bold">
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Documento</td>
                        <td>Tipo de Documento</td>
                        <td>Edad</td>
                        <td>Estado</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      // Mostrar resultados
                      foreach ($pacientes as $paciente) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($paciente['nombres']) . "</td>";
                        echo "<td>" . htmlspecialchars($paciente['apellidos']) . "</td>";
                        echo "<td>" . htmlspecialchars($paciente['documento']) . "</td>";
                        echo "<td>" . htmlspecialchars($paciente['glosa']) . "</td>";
                        echo "<td>" . htmlspecialchars($paciente['edad']) . "</td>";
                        echo "<td>" . htmlspecialchars($paciente['estado']) . "</td>";
                        echo "<td><a href='formularios/EditarFormulario.php?id_paciente=" . htmlspecialchars($paciente['id_paciente']) . "' class='btn btn-warning'>Editar</a></td>";
                        echo "<td><a href='CRUD/EliminarDatos.php?id_paciente=" . htmlspecialchars($paciente['id_paciente']) . "' class='btn btn-danger'>Eliminar</a></td>";
                        echo "</tr>";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>