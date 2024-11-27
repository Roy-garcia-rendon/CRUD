<!DOCTYPE html>
<html>

<head>
    <title>BIBLIOTECA VIRUAL</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x.ico" href="imagenes/per1.ico">
    <link rel="stylesheet" href="css/estilos2.css" type="text/css">
    <style>
        #botonesr{
            background: #3E7C17;
        color: #F4A442;
        border-radius: 4px;
        font-size: 17px;
        font-family: Arial, Helvetica, sans-serif;
        margin: 20px;
        padding: 10px;
        }
        #botonesr:hover{
            color: #3E7C17;
            background: #F4A442;
        }
    </style>
</head>

<body>

    <header>
        <center>
            <h1>SISTEMA PARA EL CONTROL DE LIBROS </h1>

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
     
     if($conexion->connect_errno){
        die("La conexión ha fallado" . $conexion->connect_errno);
     }
     $seleccionar= "SELECT * FROM libros";

    ?>
    <center>

    <form action="eliminar.php" method="post">
        <fieldset>
            <legend>
                <h3>
                 
                </h3>
            </legend>
            <br>
            <br>
            <a href="insercion.php">inser</a>
                <a href="select.php">select</a>
            <label for="ISBN">ISBN DEL LIBRO A DAR DE BAJA:</label>
            <input type="number" id="ISBN" name="isbn" placeholder="Escribe numero de ISBN" autofocus>
            <br>
            
            <pre><input type="submit" value="ELIMINAR" name="eliminar"> 
  
            <?php
    if (isset($_POST['eliminar'])){
        $isbnv=$_POST['isbn'];  
        $eliminar="DELETE FROM libros where isbn=$isbnv";
          /*   crea la variable para aplicar la acción de eliminar */
        if ($conexion->query($eliminar) == true){
            echo 'registro eliminado';
        } else{
            die("error al eliminar el registro: " . $conexion->error);
        }
     }
     ?>   </fieldset>
        </form>
        <table border="2">
            <tr>
                <th colspan="5" class="titulos" style="font-size: 20px; margin: 10px; padding: 5px; ">LIBROS REGISTRADOS</th>
            </tr>
            <tr>
                <td class="titulos"><b>ISBN</b></td>
                <td class="titulos"><b>NOMBRE</b></td>
                <td class="titulos"><b>AUTOR</b></td>
                <td class="titulos"><b> FECHA EDICIÓN</b></td>
                <td class="titulos"><b>GENERO</b></td>
            </tr>
            <?php $resultado = mysqli_query($conexion, $seleccionar); 
            
            
            while($row=mysqli_fetch_assoc($resultado)) {?>
            <tr>
                <td><?php echo $row["isbn"]; ?></td>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["autor"]; ?></td>
                <td><?php echo $row["fecha"]; ?></td>
                <td><?php echo $row["genero"]; ?></td>
            </tr>
            <?php  } ?>


        </table>
    </center>
    <br>
    <br>
       
       
    </section>
    <footer>
        <p>Mirian Ochoa Benítez-2024</p>
    </footer>
</body>
<?php
       
         mysqli_close($conexion);
        ?>
</html>