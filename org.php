<ul id="org" style="display:none">
  <?php
  $jefeSec = $conexion->query("SELECT * FROM jefe_seccion");
  if ($jefeSecc = $jefeSec->fetch_assoc()) {}
    ?>
    <li class="js">JEFE SECCIÓN
      <?php echo "<p>".$jefeSecc["nombre"]."</p>"; ?>
      <ul>
        <?php
        $jefeUn = $conexion->query("SELECT * FROM jefe_unidad WHERE not rut='000000000'");
        $rows_jefe = mysqli_num_rows($jefeUn);
        $jefes_un = array();
        if ($jefeUnidad = $jefeUn->fetch_all()) {}
          for ($i=0; $i < $rows_jefe ; $i++) {
            array_push($jefes_un,$jefeUnidad[$i][0]);
          }
          for ($i=0; $i < $rows_jefe ; $i++) {
            ?>
            <li>JEFE UNIDAD
              <?php echo "<p>".$jefeUnidad[$i][1]."</p>";
              ?>
              <ul>
                <?php
                $super = $conexion->query("SELECT * FROM supervisor WHERE not rut = '000000000'");
                $rows_sup = mysqli_num_rows($super);
                if ($supervisor = $super->fetch_all()) {}
                  for ($a=0; $a < $rows_sup ; $a++){
                    if ($supervisor[$a][2] == $jefeUnidad[$i][0] ) {
                      ?>
                      <li >SUPERVISOR
                        <?php echo "<p>".$supervisor[$a][1]."</p>";
                        ?>
                        <!--------------------- --------->
                        <?php
                        foreach ($clientes as $rut) {
                          $sqlFun = "SELECT fun.nombre,fun.apellido,obr.nombre , fun.id_obra,fun.rut_supervisor FROM obra obr, funcionario fun ,supervisor su WHERE fun.id_obra= obr.id and fun.rut_supervisor = su.rut and not fun.id_obra = '7' and not fun.rut_supervisor = '000000000' and rut_supervisor='".$supervisor[$a][0]."' and not fun.estado = '1' ORDER BY obr.nombre ";
                          $fun = $conexion->query($sqlFun);
                          if ($funcionario = $fun->fetch_all()) {}
                            $rows_fun = mysqli_num_rows($fun);
                          echo f($rows_fun,$funcionario,0);
                          }
                        ?>
                      </li>
                      <?php
                    }
                  }
                  ?>
                </ul>
              </li>
              <?php
            }
            ?>
          </ul>
        </li>
      </ul>
