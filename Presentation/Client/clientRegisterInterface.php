<?php
include '../../Business/Client/clientBusiness.php';
$clientBusiness = new clientBusiness();
?>

<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clientes</title>
        <script language="javascript">
            var codCanton = new Array();
            var idProvince = new Array();
            var canton = new Array();
            var codDistrict = new Array();
            var district = new Array();

            function limpiarMunicipios() {
                var reference = document.frmCombos.cmbCanton;
                var largo = reference.options.length;
                for (j = 0; j < 8; j++)
                    for (i = 0; i < largo; i++)
                        document.frmCombos.cmbCanton.remove(i);
            }

            function cargarMunicipios(valor) {
                var longitud = idProvince.length;
                var reference = document.frmCombos.cmbCanton;
                var i = 0;
                var j = 0;

                limpiarMunicipios();

                for (i = 0; i < longitud; i++) {
                    if (idProvince[i] == valor) {
                        var newOption = new Option(canton[i], codCanton[i]);
                        reference.options[j] = newOption;
                        j++;
                    }
                }
                document.frmCombos.totalMunicipios.value = j + ' canton';
            }
            function limpiarDistrict() {
                var reference = document.frmCombos.cmbDistrict;
                var largo = reference.options.length;
                for (j = 0; j < 8; j++)
                    for (i = 0; i < largo; i++)
                        document.frmCombos.cmbDistrict.remove(i);
            }

            function cargarDistrict(valor) {
                var longitud = codCanton.length;
                var reference = document.frmCombos.cmbDistrict;
                var i = 0;
                var j = 0;

                limpiarDistrict();

                for (i = 0; i < longitud; i++) {
                    if (codCanton[i] == valor) {
                        var newOption = new Option(district[i], codDistrict[i]);
                        reference.options[j] = newOption;
                        j++;
                    }
                }
                //document.frmCombos.totalMunicipios.value = j + ' Distrito';
            }
        </script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>        
        <script>
            $(function () {
                $(".datepicker").datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true});
            });

        </script>

        <!--script type="text/javascript">
$(function() {
$('input').filter('.datepicker').datepicker({
    dateFormat:'yy-mm-dd',
changeMonth: true,
changeYear: true,
showOn: 'button',
buttonImage: 'jquery/images/calendar.gif',
buttonImageOnly: true
});
});
        </script -->


    </head>
    <body>
        <!-- Menu -->
        <b><a href="../../index.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <br> <a href="">Cliente</a>
        <!-- Fin menu -->

      

        <!-- Formulario para insertar un nuevo cliente -->

        <!-- Form -->

        <form name="frmCombos" method="post" action="../../Business/Client/clientRegisterAction.php">
            <h1>Registro de Nuevo Usuario</h1>
            <h3>Usuario</h3>
            <input type="email" id="txtEmailClient" name="txtEmailClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="E-mail"> *
            <input type="text" id="txtUserClient" name="txtUserClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Usuario" size="10" maxlength="15"> *
            <input type="password" id="txtPasswordClient" name="txtPasswordClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Clave" size="10" maxlength="15"> *
            <br><h3>Nombre</h3>            
            <input type="text" id="txtNameClient" name="txtNameClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre"> *
            <input type="text" id="txtLastNameFClient" name="txtLastNameFClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Primer Apellido"> *
            <input type="text" id="txtLastNameSClient" name="txtLastNameSClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Segundo Apellido"> *
            <h3>Datos</h3>
            <input type="text" name="bornClient" size="10" maxlength="15" class="datepicker">           
            <select name="cbSexClient" id="cbSexClient">          
                <?php
                $result2 = $clientBusiness->getSexualPreferences();
                foreach ($result2 as $sexClie) {
                    echo'<option value=' . $sexClie->getNameSexPreferences() . '>' .
                    $sexClie->getNameSexPreferences() . '</option>';
                }
                ?>
            </select> 
            <input type="text" id="txtTelClient" name="txtTelClient" placeholder="Telefono"> 
            <h3>Direcci&#243;n</h3> 
            <?php
            
            $consulta = $clientBusiness->consulta("SELECT idProvince, nameProvince FROM tbprovince WHERE idProvince > 0 ORDER BY idProvince ASC;");
            $combo = "";
            $i = 0;
            if ($clientBusiness->num_rows($consulta) > 0) {
                echo'<select name="cmbProvince" onchange="cargarMunicipios(value);">';
                while ($resultados = $clientBusiness->fetch_array($consulta)) {
                    if ($i == 0)
                        echo '<option value="-1">Provincia</option>' . "\n";
                    echo'<option value="' . $resultados[0] . '">' . $resultados[1] . "</option>\n";
                    $i++;
                }
                echo "</select>\n";
            }
            

            echo ''. fullCanton() .''. fullDistrict().'';
            ?>
            <input type="text" id="txtAddressClient1" name="txtAddressClient1" placeholder="Barrio"> 
            <input type="text" id="txtAddressClient2" name="txtAddressClient2" placeholder="Localizacion"> 

            <input  type="submit" id="btnInsert" name="btnInsert" value="Insertar" >
        </form>
        <br><label id="txtMessage">* campo obligatorio</label>

        <!-- Fin del form -->

        
    </body>
    <?php
    
    if (isset($_GET['InsertClientComplete'])) {
        echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Se realizó con éxito";
          </script>';
    } else if (isset($_GET['error1'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error de E-mail";
          </script>';
    } else if (isset($_GET['error2'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Usuario";
           </script>';
    } else if (isset($_GET['error3'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error de Contraseña";
          </script>';
    } else if (isset($_GET['error4'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con los datos ingresados en Nombre";
           </script>';
    } else if (isset($_GET['error5'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error con el Primer Apellido";
          </script>';
    } else if (isset($_GET['error6'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error con el Segundo Apellido";
           </script>';
    } else if (isset($_GET['error7'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido, por favor verifique su fecha de nacimiento";
          </script>';
    } else if (isset($_GET['error8'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error en el campo Preferencias Sexuales";
           </script>';
    } else if (isset($_GET['error9'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido, por favor Verifique su telefono";
          </script>';
    } else if (isset($_GET['error10'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de selecion de Provincia";
           </script>';
    } else if (isset($_GET['erro11'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error de selecion de Canton";
          </script>';
    } else if (isset($_GET['error12'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Selecion de Distrito";
           </script>';
    } else if (isset($_GET['error13'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido, por favor Verifique el Nombre de su Barrio";
          </script>';
    } else if (isset($_GET['error14'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Registro fallido, por favor Verifique su direccion exacta";
           </script>';
    } else if (isset($_GET['error16'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Registro fallido, por favor Verifique sus datos";
          </script>';
    } else if (isset($_GET['update'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Se realizó con éxito";
           </script>';
    } else if (isset($_GET['error15'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "El E-mail que intenta registrar, ya fue registrado en la Base de Datos";
           </script>';
    } else if (isset($_GET['error17'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Fallo el desactivar Cliente, verifique conexion";
           </script>';
    } else if (isset($_GET['error18'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Configuracion, por favor consulte con Soporte";
           </script>';
    } else if (isset($_GET['error19'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Por favor verifique los datos del cliente que desea actualizar, Uno o mas campos no cumplenlos requisitos de registro";
           </script>';
    } else if (isset($_GET['error20'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Hubo un error a lahora de actualizar,verifique conexion";
           </script>';
    } else if (isset($_GET['delete'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Se realizó con éxito";
           </script>';
    }
   

    else if (isset($_GET['sucess'])) {
        echo '<script>                        
             document.getElementById("txtMessage").innerHTML = "Registro con éxito";
          </script>';
    } else if (isset($_GET['errorSQL'])) {
        echo '<script>                
              document.getElementById("txtMessage").innerHTML = "Error de Inserción";
          </script>';
    } else if (isset($_GET['errorData'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Datos, revise todos los campos";
           </script>';
    } 
    ?>

</html>


<?php
function fullProvince() {
    $db = new clientBusiness();
    $consulta = $db->fullProvince();
    $combo = "";
    $i = 0;
    if ($db->num_rows($consulta) > 0) {
        $combo = '<select name="cmbProvince" onchange="cargarMunicipios(value);" onloadstart="3" >';
        while ($resultados = $db->fetch_array($consulta)) {
            if ($i == 0)
                $combo .= '<option value="-1">Provincia</option>' . "\n";
            $combo .= '<option value="' . $resultados[0] . '">' . $resultados[1] . "</option>\n";
            $i++;
        }
        $combo .= "</select>\n";
    }
    return $combo;
}

function fullCanton() {
    $db = new clientBusiness();
     $query = "SELECT idCanton,nameCanton, idProvince  FROM tbcanton WHERE idProvince > 0 ORDER BY idCanton ASC;";
    $consulta = $db->consulta($query);
    
    $combo = "";
    $i = 0;
    if ($db->num_rows($consulta) > 0) {
        $combo = '<select name="cmbCanton" onchange="cargarDistrict(value);">';
        echo "<script language='javascript'>\n";
        while ($resultados = $db->fetch_array($consulta)) {
            if ($i == 0) {
                $combo .= '<option value="-1">Cant&oacute;n</option>' . "\n";
            }
            '<option value="' . $resultados[0] . '">' . "</option>\n";
            echo "codCanton[" . $i . "] = " . $resultados[0] . ";\n";
            echo "idProvince[" . $i . "] = " . $resultados[2] . ";\n";
            echo "canton[" . $i . "] = '" . $resultados[1] . "';\n";
            $i++;
        }
        echo "</script>\n";
        $combo .= "</select>\n";
    }
    return $combo;
}

function fullDistrict() {
    $db = new clientBusiness();
    $query = "SELECT idDistrict,nameDistrict, idCanton  FROM tbdistrict WHERE idCanton > 0 ORDER BY idDistrict ASC;";
    $consulta = $db->consulta($query);
    $combo = "";

    if ($db->num_rows($consulta) > 0) {
        $combo = '<select name="cmbDistrict">';
        $i = 0;
        echo "<script language='javascript'>\n";
        while ($resultados = $db->fetch_array($consulta)) {
            if ($i == 0) {
                $combo .= '<option value="-1">Distrito</option>' . "\n";
            }
            '<option value="' . $resultados[0] . '">' . "</option>\n";
            echo "codDistrict[" . $i . "] = " . $resultados[0] . ";\n";
            echo "codCanton[" . $i . "] = " . $resultados[2] . ";\n";
            echo "district[" . $i . "] = '" . $resultados[1] . "';\n";
            $i++;
        }
        echo "</script>\n";
        $combo .= "</select>\n";
    }
    return $combo;
}
?>
