<?php
if (@session_start() == true) {
    if (isset($_SESSION["idUser"])) {
        include '../../Business/Client/clientBusiness.php';
        $clientBusiness = new clientBusiness();
        ?>

<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perfil</title>
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
                document.frmCombos.totalMunicipios.value = j + ' Distrito';
            }
        </script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>        
        <!--script>
            $(function () {
                $(".datepicker").datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true});
            });

        </script-->

        <script type="text/javascript">
            $(function () {
                $('input').filter('.datepicker').datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    showOn: 'button',
                    buttonImage: 'jquery/images/calendar.gif',
                    buttonImageOnly: true
                });
            });
        </script>


    </head>
    <body>
        <!-- Menu -->
        <b><a href="../Modules/ClientView.php">Inicio</a></b>&nbsp;&nbsp;&nbsp;&nbsp;
        <br> <a href="">Cliente</a>
        <!-- Fin menu -->

        <h1 lang="es">Actualizar mis Datos</h1>
       
        
        <?php
        $result1 = $clientBusiness->getAClient($_SESSION['idUser']);
        foreach ($result1 as $tem) {   
        ?>          
        <form name="frmCombos" method="post" action="../../Business/Client/clientUpdateAction.php">
            
            <h3>Usuario</h3>
            <input type="hidden" id="idClient" name="idClient" value="<?php echo '' . $tem->idClient . '';?>">
            <input type="email" id="txtEmailClient" name="txtEmailClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="ejemplo@email.com" value="<?php echo ''.$tem->emailClient.''; ?>"> 
            <input type="text" id="txtUserClient" name="txtUserClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Usuario" size="10" maxlength="15" value="<?php echo ''.$tem->userClient.''; ?>" > 
            <input type="password" id="txtPasswordClient" name="txtPasswordClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Clave" size="10" maxlength="15" value="<?php echo ''.$tem->passwordClient.''; ?>" > 
            <br><h3>Nombre</h3>            
            <input type="text" id="txtNameClient" name="txtNameClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Nombre" value="<?php echo ''.str_replace('+', '&nbsp;', $tem->nameClient).''; ?>" > 
            <input type="text" id="txtLastNameFClient" name="txtLastNameFClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Primer Apellido" value="<?php echo ''.$tem->lastNameFClient.''; ?>"> 
            <input type="text" id="txtLastNameSClient" name="txtLastNameSClient" 
                   data-validation="custom" data-validation-regexp="^([a-zA-Z]+)$"
                   placeholder="Segundo Apellido" value="<?php echo ''.$tem->lastNameSClient.''; ?>"> 
            <h3>Datos</h3>
            <input type="text" name="bornClient" size="10" maxlength="15"
                   class="datepicker" value="<?php echo ''.$tem->bornClient.''; ?>" >           
            <select name="cbSexClient" id="cbSexClient"  >          
                <?php
                $result2 = $clientBusiness->getSexualPreferences();
                foreach ($result2 as $sexClie) {
                    ?>
                <option value="<?php echo $sexClie->getNameSexPreferences() ?>"
                    <?php
                            if ($sexClie->getNameSexPreferences()==$tem->sexClient){
                                echo 'selected';
                            }
                            ?>
                    >
                    <?php echo ''.$sexClie->getNameSexPreferences() . '';?>
                </option>
                <?php
                }
                ?>
            </select> 
            <input type="text" id="txtTelClient" name="txtTelClient" 
                   placeholder="Telefono" value="<?php echo '' . $tem->telephoneClient . '';?>"> 
            <h3>Direcci&#243;n</h3>
            Provincia
            <?php
            $consulta = $clientBusiness->fullProvince();            
            $i = 0;
            if ($clientBusiness->num_rows($consulta) > 0) {
                echo'<select name="cmbProvince" onchange="cargarMunicipios(value);">';
                while ($resultados = $clientBusiness->fetch_array($consulta)) {                    
                    echo'<option value="' . $resultados[0] . '"';
                    if($resultados[1]==str_replace('+', '&nbsp;',$tem->provinceClient)){
                        echo ' selected ';
                    }
                    echo'>' . $resultados[1] . "</option>\n";
                    $i++;
                }
                echo "</select>\n";
            }
            
            echo '' . fullCanton() . '' . fullDistrict() . '';
            ?>
            <input type="text" id="txtAddressClient1" name="txtAddressClient1" placeholder="Barrio" value="<?php echo '' . str_replace('+', '&nbsp;', $tem->addressClient1) .'';?>"> 
            <input type="text" id="txtAddressClient2" name="txtAddressClient2" placeholder="Localizacion" value="<?php echo '' . str_replace('+', '&nbsp;', $tem->addressClient2) .'';?>"> 

            <input  type="submit" id="btnUpdate" name="btnUpdate" value="Actualizar" >
            <input  type="submit" id="btnDelete" name="btnDelete" value="Desactivar" >
        </form>
        
        <?php
        }
        ?>
        
        <br><label id="txtMessage">* campo obligatorio</label>

        <!-- Fin del form -->


    </body>
    <?php
    if (isset($_GET['error17'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Fallo el desactivar Cliente, verifique conexion";
           </script>';
    } else if (isset($_GET['error18'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "Error de Configuracion, por favor consulte con Soporte";
           </script>';
    } else if (isset($_GET['error19'])) {
        echo ' <script>                
               document.getElementById("txtMessage").innerHTML = "﻿ERROR! Debe ingresar todos los datos solicitados";
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
    ?>

</html>
        <?php
    }
}else header('location: ../../index.php');
?>

    <?php

function fullCanton() {
    $db = new clientBusiness();
     
    $consulta = $db->fullCanton();
    
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