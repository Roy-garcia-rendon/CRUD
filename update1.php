<!DOCTYPE html>
<html>

<head>
    <title>BIBLIOTECA VIRUAL</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x.ico" href="imagenes/per1.ico">
    <link rel="stylesheet" href="css/estilos2.css" type="text/css">
</head>

<body>

    <header>
        <center>
            <h1>SISTEMA PARA EL CONTROL DE LIBROS </h1>
            <a href="eliminar.php">eli</a>
            <a href="update.php">up</a>
                <a href="insercion.php">select</a>

        </center>
        <div></div>
        <nav>
            <ul>
               
            </ul>
        </nav>
    </header>
    <section class="main">
        <?php

        $conexion=mysqli_connect("localhost", "root", "", "biblioteca");
        $isv=$_GET['is'];
$seleccionar="SELECT * from libros where isbn='$isv'";
   /*   crea la variable para aplicar la acción de seleccionar */

      
        ?>
        <center>
            <form action="" method="post">
        <table border="2">
            <tr>
                <th colspan="6" class="titulos" style="font-size: 20px; margin: 10px; padding: 5px; ">LIBROS REGISTRADOS</th>
            </tr>
            <tr>
                <td class="titulos"><b>ISBN</b></td>
                <td class="titulos"><b>NOMBRE</b></td>
                <td class="titulos"><b>AUTOR</b></td>
                <td class="titulos"><b> FECHA EDICIÓN</b></td>
                <td class="titulos"><b>GENERO</b></td>
                <td class="titulos"><b>acción</b></td>
            </tr>
            <?php $resultado = mysqli_query($conexion, $seleccionar); 
            
            
            while($row=mysqli_fetch_assoc($resultado)) {?>
            <tr>
                <td><input type="hidden" value="<?php echo $row["isbn"];?>" name="isbn"></td>
                <td><input type="text" value="<?php echo $row["nombre"];?>" name="nombre"></td>
                <td><input type="text" value="<?php echo $row["autor"]; ?>" name="autor"></td>
                <td><input type="date" value="<?php echo $row["fecha"]; ?>" name="fecha"></td>
                <td><input type="text" value="<?php echo $row["genero"]; ?>" name="genero"></td>
               
                <td><input type="submit" value="Actualizar" name="accion"></td>
            </tr>
            <?php  } ?>
            <?php
    if (isset($_POST['accion'])){
    $isbnv=$_POST['isbn'];
    $nombrev=$_POST['nombre']; 
    $autorv=$_POST['autor'];
    $fecha_ediv=$_POST['fecha'];
    $generov=$_POST['genero'];
$actualizar="UPDATE libros set nombre='$nombrev', autor='$autorv', fecha='$fecha_ediv', genero='$generov' where isbn='$isbnv'";
    /*   crea la variable para aplicar la acción de insertar */
    if ($conexion->query($actualizar) == true){
            header("location:update.php");
        } else{
            die("error al actualizar los datos: " . $conexion->error);
        }
     }
             
        
     ?> 
            


        </table></form>
    </center>

       <?php
        mysqli_free_result($resultado);
         mysqli_close($conexion);
        ?>
    </section>
    <footer>
        <p>Mirian Ochoa Benítez-2024</p>
    </footer>
</body>

</html>