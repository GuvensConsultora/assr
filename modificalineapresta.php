<HTML>
<HEAD>
<STYLE type="text/css">
  TABLE {border: 1px solid black; border-spacing: 0pt;width:100%}
  th {width:50%}
  TD {border: 1px solid black; border-spacing: 0pt;}
</STYLE>
</HEAD>
<BODY>
  <?php
     $linea=$_POST['id'];
 
   echo "<div align=center><h2> Area Sanitaria San Rafael </h2></div>"; echo "<div align=center><h3> Modifica linea en la carga de formularios </h3></div>";
     
$host        = "host = 172.17.0.2";
$port        = "port = 5432";
$dbname      = "dbname = sistema";
$credentials = "user = horacio password=123456";
     $conn = pg_connect("$host $port $dbname $credentials");     
     echo "<FORM name=modifica method=post action=prestacion.php>";
     echo "<input type=hidden value=$linea name=id>";
     echo "<input type=hidden value='modifica' name=tipo>";
$sql="select * from nomencladores.arapres where id=$linea";
$resultado=pg_query($conn,$sql);
$row = pg_fetch_row($resultado);
echo "<div align=center><table width=30% border=1>";
echo "<tr><th style='width:30px'>Código HPGD</th><td><input type=text name=cod value='$row[1]'></td></tr>";
echo "<tr><th style='width:30px'>Código de carga</th><td><input type=text name=codcar value='$row[3]'></td></tr>";     
echo "<tr><th>Descripción</th><td><input style='width:100%' type=text name=desc value='$row[4]'></td></tr>";
echo "<tr><th>Importe hasta mayo 2022</th><td><input type=text name=imp value='$row[2]'></td></tr>";
echo "<tr><th>Importe hasta octubre 2022</th><td><input type=text name=impmay22 value='$row[7]'></td></tr>";
echo "<tr><th>Importe posterior</th><td><input type=text name=impoct22 value='$row[8]'></td></tr>";
echo "<tr><td></td><td><input type=submit name=modifica></td></tr>";
echo "</table></form>";
   ?>
<IMG SRC="http://194.163.45.54:8080/assr/images/giphy.gif">
</BODY>
</HTML>
