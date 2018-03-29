<?php
$server = "localhost";
$user = "root";
$pass = "";
$bd = "inventario";
$conexion = mysqli_connect($server, $user, $pass,$bd);
$sql = "
SELECT js.rut as 'js', ju.rut as 'ju', su.rut as 'su', fun.nombre as 'fun',fun.apellido,obr.id as 'obr'FROM obra obr, funcionario fun , jefe_seccion js,jefe_unidad ju , supervisor su WHERE fun.id_obra= obr.id AND ju.jefe_seccion = js.rut and su.jefe_unidad = ju.rut and fun.rut_supervisor = su.rut and not fun.id_obra = '7' and not fun.rut_supervisor = '000000000' and not fun.estado='1' ORDER BY obr.nombre";
mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
if(!$result = mysqli_query($conexion,$sql)) die();
$clientes = array(); //creamos un array
$sqlSup = "SELECT rut FROM supervisor WHERE not rut='000000000'";
$resultSup = $conexion->query($sqlSup);
if ($res = $resultSup->fetch_all()) {}
foreach ($res as $item) {
  array_push($clientes,$item);
}
  function f($level,&$funcionario,$cont){
    for ($i=0; $i < $level; $i++) {
      $server = "localhost";
      $user = "root";
      $pass = "";
      $bd = "inventario";
      $conexion = mysqli_connect($server, $user, $pass,$bd);
      $sqlNum = "SELECT nombre,apellido from funcionario where id_obra='".$funcionario[$cont][3]."' AND NOT estado='1' AND rut_supervisor='".$funcionario[$cont][4]."'";
      $num = $conexion->query($sqlNum);
      if ($func = $num->fetch_all()){}
      $rows_obr = mysqli_num_rows($num);
      if ($rows_obr <= 1) {
          return $level<0? "" : "<ul><li>"."<p>".$funcionario[$cont][0]." ".$funcionario[$cont][1]." / ".$funcionario[$cont][2].f($level-1,$funcionario,++$cont)."</li></ul>";
      }else {
        $nombre = "";
        for ($c=0; $c < $rows_obr ; $c++) {
          $nombre .= $func[$c][0]." ".$func[$c][1]." , \n";
        }
        return $level<0? "" : "<ul><li>"."<p>".$nombre."  ".$funcionario[$cont][2]."</li></ul>";
      }

    }
  }
?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Organigrama</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="css/custom.css"/>
    <link href="css/prettify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script src="js/jquery.jOrgChart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js" integrity="sha384-CchuzHs077vGtfhGYl9Qtc7Vx64rXBXdIAZIPbItbNyWIRTdG0oYAqki3Ry13Yzu" crossorigin="anonymous"></script>
    <script>
    jQuery(document).ready(function() {
      $("#org").jOrgChart({
        chartElement : '#chart',
        dragAndDrop  : false
      });
    });
    </script>
  </head>
  <body>
    <a href="index.php" class="btn btn-primary">Atras</a>
    <button type="button" name="button" id="pdf" class="btn btn-primary"> PDF </button>
    <?php require_once 'org.php'; ?>
            <div id="chart" class="orgChart"></div>
          <script type="text/javascript">
          $(document).ready(function () {
            $('#pdf').click(function() {
              html2canvas(document.body, {
                    onrendered:function(canvas) {
                       var contentWidth = canvas.width;
                       var contentHeight = canvas.height;
                       //The height of the canvas which one pdf page can show;
                       var pageHeight = contentWidth / 592.28 * 841.89;
                       //the height of canvas that haven't render to pdf
                       var leftHeight = contentHeight;
                       //addImage y-axial offset
                       var position = 0;
                       //a4 format [595.28,841.89]
                             var imgWidth = 595.28;
                       var imgHeight = 640/contentWidth * contentHeight;

                       var pageData = canvas.toDataURL('image/jpeg', 1.0);

                       var pdf = new jsPDF('', 'pt', 'a4');

                      if (leftHeight < pageHeight) {
                           pdf.addImage(pageData, 'JPEG', 0, 0, imgWidth, imgHeight );
                       } else {
                           while(leftHeight > 0) {
                               pdf.addImage(pageData, 'JPEG', 0, position, imgWidth, imgHeight)
                               leftHeight -= pageHeight;
                               position -= 841.89;
                               //avoid blank page
                               if(leftHeight > 0) {
                                   pdf.addPage();
                               }
                           }
                       }
                       pdf.save('Organigrama.pdf');
                    }
                     })
              });
            });

          </script>

        </body>
</html>
