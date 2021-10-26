<?php


function getAll(){
    global $conexion;
    $consulta_sql = "SELECT * FROM contenido LEFT JOIN tags ON contenido.id=tags.id";
    $resultados = $conexion->query($consulta_sql)
    or die ("Algo ha ido mal en la consulta a la base de datos");
    // ESTA ES OTRA FORMA DE HACER LA CONSULTA, ES LO MISMO, DE FORMA PROCEDURAL. SUSTITUIRIA A LAS DOS SENTENCIAS ANTERIORES.
    //$resultados = mysqli_query($conexion, "SELECT * FROM contenido LEFT JOIN tags ON contenido.id=tags.id");
    /*if($conexion->num_rows == 0){
    echo "lo que quieras que se muestre si la pagina que pide el usuario no existe";
    //header("location: index.php");
    }*/
    return $resultados; 
}

    function getContenidoById($id) {
        global $conexion;
        $consulta_sql = "SELECT * FROM contenido WHERE id=$id";
        $resultados = $conexion->query($consulta_sql)
        or die ("Algo ha ido mal en la consulta a la base de datos");
        if($resultados->num_rows == 0){
        header("location: index.php");
        }
        $data1 = array();
        $data1 = $resultados->fetch_assoc();
        return $data1;
    }

    function getTagsById($id){
        global $conexion;
        $consulta_sql = "SELECT * FROM tags WHERE id=$id";
        $resultados = $conexion->query($consulta_sql)
        or die ("Algo ha ido mal en la consulta a la base de datos");
        $data2 = array();
        if ($resultados->num_rows > 0) {
            $data2 = $resultados->fetch_assoc();
          } else {
            $data2 = ["tag1"=>"","tag2"=>"","tag3"=>"","tag4"=>""];
          }
        return $data2;
    }
    function getImgUrl(){
        global $conexion;
        $consulta_sql = "SELECT url, imgPrincipal FROM contenido";
        $resultados3 = $conexion->query($consulta_sql)
        or die ("Algo ha ido mal en la consulta a la base de datos"); 
        return $resultados3;
    }

    function getMetadataByIdmd($idmd){
        global $conexion;
        $consulta_sql = "SELECT * FROM metadata WHERE idmd=$idmd";
        $resultado_metadata = $conexion->query($consulta_sql)
        or die ("Algo ha ido mal en la consulta a la base de datos"); 
        $data3 = array();
        $data3 = $resultado_metadata->fetch_assoc();
        return $data3;
    }
?>