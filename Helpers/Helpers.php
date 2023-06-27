<?php
function base_url()
{
    return BASE_URL;
}
function encabezado($data="")
{
    $VistaH = "Views/Template/header.php";
    require_once($VistaH);
}
function permisos($data="")
{
    $VistaPe = "Views/Errors/Permisos.php";
    require_once($VistaPe);
}
function links($data="")
{
    $VistaL = "Views/Template/links.php";
    require_once($VistaL);
}
function pie($data="")
{
    $VistaP = "Views/Template/footer.php";
    require_once($VistaP);
}
function referencias($data="")
{
    $VistaP = "Views/Template/referencias.php";
    require_once($VistaP);
}

function limpiarInput($dato) {
    // Eliminar espacios en blanco al principio y al final
    $dato = trim($dato);
    // Eliminar barras invertidas
    $dato = stripslashes($dato);
    // Convertir caracteres especiales en entidades HTML
    $dato = htmlspecialchars($dato);
    return $dato;
}

//NOTIFICACIONES
function notificaciones() {  

	// Configuración de la conexión a la base de datos
    $servername = HOST;
    $username = DB_USER;
    $password = PASS;
    $dbname = BD;

    try {
        // Crear una nueva conexión PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configurar el modo de error de PDO para mostrar excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ejecutar la consulta
        $sql = "SELECT * FROM contratos";
        $result = $conn->query($sql);

        $sql1 = "SELECT * FROM contrataciones";
        $result1 = $conn->query($sql1);

    	$sql2 = "SELECT * FROM validar_cont";
        $result2 = $conn->query($sql2);

    	$sql3 = "SELECT * FROM validar_contrata";
        $result3 = $conn->query($sql3);

    	$sql4 = "SELECT * FROM detalle_cont";
        $result4 = $conn->query($sql4);

    	$sql5 = "SELECT * FROM detalle_contrata";
        $result5 = $conn->query($sql5);

        $i = 0;
    	if($_SESSION['rol']==7){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $fechaPasada = new DateTime($row['fecha_validado']); 
                $fechaActual = new DateTime(); 
                $intervalo = $fechaActual->diff($fechaPasada); 
                $diasTranscurridos = $intervalo->days; 		

        	    if($diasTranscurridos>2 && $row['estado']==3 && $row['visto']==2){
        	    	echo "<span class=icon-badge>!</span>";
        	    }else{
        	    	echo "<span class=icon-badge>X</span>";
        	    }
            }
            while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {		
                $fechaPasada2 = new DateTime($row1['fecha_validado']); 
                $fechaActual2 = new DateTime(); 
                $intervalo2 = $fechaActual2->diff($fechaPasada2); 
                $diasTranscurridos2 = $intervalo2->days; 

    	        if($diasTranscurridos2>2 && $row1['estado']==3 && $row1['visto']==2){
    	        	echo "<span class=icon-badge>!</span>";
    	        }else{
    	            echo "<span class=icon-badge>X</span>";
    	        }
    	    }
    	        
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 							
    			if($row['estado']==3 && $row['visto']==2){
    				echo "<span class=icon-badge>!</span>";
    			}else{
    				echo "<span class=icon-badge>X</span>";
    			}
    		}

    		while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {					
    			if($dow1['estado']==3 && $row1['visto']==2){
    				echo "<span class=icon-badge>!</span>";
    			}else{
    			    echo "<span class=icon-badge>X</span>";
    			}
    		}

            while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)) {			
            	if($row1['estado']==3 && $row1['visto']==1){
            		echo "<span class=icon-badge>!</span>";
            	}else{
            		echo "<span class=icon-badge>X</span>";
            	}
            }

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {							
            	if($row['estado']==3 && $row['visto']==1){
            	    echo "<span class=icon-badge>!</span>";
            	}else{
            	    echo "<span class=icon-badge>X</span>";
            	}
            }

    	} elseif ($_SESSION['rol']==4){ 
            while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
            	if($row2['id_validador']==$_SESSION['id'] && $row2['visto']==0){	
            		echo "<span class=icon-badge>!</span>";
            	}else{
            		echo "<span class=icon-badge>X</span>";
            	}
            }

            while ($row3 = $result3->fetch(PDO::FETCH_ASSOC)) {
            	if($row3['id_validador']==$_SESSION['id'] && $row3['visto']==0){	
            		echo "<span class=icon-badge>!</span>";
            	}else{
            		echo "<span class=icon-badge>X</span>";
            	}
            }

        } elseif ($_SESSION['rol']==3 || $_SESSION['rol']==4){
    	    while ($row4 = $result4->fetch(PDO::FETCH_ASSOC)) {
    	    	if($row4['id_responde']!=$_SESSION['id'] && $row4['visto']==0){	
    	    		echo "<span class=icon-badge>!</span>";
    	    	}else{
    	    		echo "<span class=icon-badge>X</span>";
    	    	}
    	    }	
    	    while ($row5 = $result5->fetch(PDO::FETCH_ASSOC)) {
    	    	if($row5['id_responde']!=$_SESSION['id'] && $row5['visto']==0){	
    	    		echo "<span class=icon-badge>!</span>";
    	    	}else{
    	    		echo "<span class=icon-badge>X</span>";
    	    	}
    	    }
    	}

       // Cerrar la conexión
       $conn = null;
    } catch (PDOException $e) {
       echo "Error de conexión: " . $e->getMessage();
    }
										
    //VARIABLES GLOBALES
    $dato = '8';
    return $dato;
}

//FORMATO K NUMERO
function formatoK($dato) {
    if ($dato >= 1000) {
        $dato = number_format($dato / 1000, 1) . 'k';
    } else {
        $dato = $dato;
    }
    return $dato;
}

//FORMATO NUMERO ENTEROS MILES
function miles($dato) {
    $dato = number_format($dato,0,'.',',');
    return $dato;
}

//FORMATO NUMERO DECIMALES MILES
function decimales($dato) {
    $dato = number_format($dato,2,'.',',');
    return $dato;
}


?>