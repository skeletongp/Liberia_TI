<form method="POST" action="login.php"></form>
<?php require("static/conect.php"); ?>
<?php include("static/layout.php"); ?>
<?php
if(isset($_POST ["subir"])){
    $nombre=$_POST['nombre']; $correo=$_POST['correo']; $usuario=$_POST['usuario']; 
    $contra=$_POST['contra']; $telefono=$_POST['tel']; $area=$_POST['area']; $descripcion=$_POST['descripcion']; $ruta="img/";
    $temporal=$_FILES["foto"]["tmp_name"];
    
    $string= "SELECT * FROM usuario WHERE Usuario='$usuario' OR Correo='$correo';";
    $result = $con->query($string);
    if ($result->num_rows < 1) {
        mkdir($ruta.$usuario, 0777, true);

    $subido=$ruta."/".$usuario."/".$usuario.".png";
        $image= $_FILES["foto"]["tmp_name"];
        
        $insertar= $con->query("INSERT INTO usuario (Nombre, Correo, Usuario, Contra, Telefono, Area, Descripcion) VALUES ('$nombre', '$correo', '$usuario', '$contra', '$telefono', '$area', '$descripcion')");
        if (is_uploaded_file($temporal)&&  mkdir($ruta.$usuario, 0777, true))
{
    move_uploaded_file($temporal,$subido);
    ?>
<body  onload="Existe()"></body>
<script>
function Existe(){
    alert ("Registrado con éxito");
    location.replace('registro.php');
} </script>
    <?php
  header("Location: logueo.php");
    return true;
}
else
{
    header("Location: home.php");
return false;
}  

        
   
}
else{
?>
<body  onload="Existe()"></body>
<script>
function Existe(){
    alert ("Usuario o Correo ya Registrado");
    location.replace('registro.php');
} </script>
    <?php
}
}
?>
