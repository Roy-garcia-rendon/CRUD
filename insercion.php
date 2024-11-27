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
        margin: 20px;-
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
       
        <form action="insercion.php" method="post" style="background: #66ff66; color:#3E7C17; margin:10px; padding: 5px;">
        <fieldset>
            <legend>
                <h3>DATOS PARA REGISTRAR NUEVOS LIBROS</h3>
                <a href="eliminar.php">eli</a>
                <a href="select.php">select</a>
            </legend>
            <br>
            <br>
            <label for="isbn">Escribe Numero de ISBN:</label>
            <input type="number" id="isbn" name="isbn" placeholder="Anota el ISBN correspondiente" autofocus>
            <br>
            <br>
            <label for="nombre">Nombre del libro:</label>
            <input type="text" id="nombre" name="nombre" maxlength="20" placeholder="Escribe nombre completo ">
            <br>
            <br>
                 
            <label for="autor">Autor del Libro:</label>
            <input type="text" id="autor" name="autor" placeholder="Autor del libro">
            <br>
            <br>
            <label for="fecha_edi">Seleciona tu fecha de edición:</label>
            <input type="date" id="fecha_edi" name="fecha_edi">
            <br>
            <br>
            <label for="genero">Genero del libro:</label>
            <input type="text" id="genero" name="genero" placeholder="Escribe el genero del libro">
            <br>
            <br>
            <pre><input type="submit" value="REGISTRAR" name="registrar" id="botonesr">        <input type="reset" value="LIMPIAR" id="botonesr"> </pre>
        
           

            <?php
    if (isset($_POST['registrar'])){
        
     $conexion=mysqli_connect("localhost", "root", "", "biblioteca");
     
     if($conexion->connect_errno){
        die("La conexión ha fallado" . $conexion->connect_errno);
     }
    $isbnv=$_POST['isbn'];
    $nombrev=$_POST['nombre']; 
    $autorv=$_POST['autor'];
    $fecha_ediv=$_POST['fecha_edi'];
    $generov=$_POST['genero'];
$insertar="INSERT INTO libros(isbn,nombre,autor,fecha,genero)
values('$isbnv','$nombrev','$autorv','$fecha_ediv','$generov')";
    /*   crea la variable para aplicar la acción de insertar */
    if ($conexion->query($insertar) == true){
            echo 'registro almacenado';
        } else{
            die("error al insertar los datos: " . $conexion->error);
        }
     }
             
        
     ?>   

</fieldset>
    </form>
       
    </section>
    <footer>
        <p>Mirian Ochoa Benítez-2024</p>
    </footer>

        
</body>

</html>


