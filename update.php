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
       $seleccionar="SELECT * from libros";
   /*   crea la variable para aplicar la acción de seleccionar */

      
        ?>
        <center>
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
                <td class="titulos"><b>editar</b></td>
            </tr>
            <?php $resultado = mysqli_query($conexion, $seleccionar); 
            
            
            while($row=mysqli_fetch_assoc($resultado)) {?>
            <tr>
                <td><?php echo $row["isbn"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["autor"]; ?></td>
                <td><?php echo $row["fecha"]; ?></td>
                <td><?php echo $row["genero"]; ?></td>
                <td> <a href="update1.php?is=<?php echo $row["isbn"];?>">modificar</a></td>
            </tr>
            <?php  } ?>


        </table>
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