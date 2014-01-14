<?php

$nombres=array("maria","jose", "luis", "lupita");



$tabla="<table style='text-align:center;margin-top:10px;' border='1'>
            <tr>
                <td>No. de Alumno</td>
                <td>Nombre del Alumno</td>
            </tr> ";

            $num=1;

         foreach($nombres as $td)
         {
            $tabla.="<tr>
                        <td>$num</td>
                        <td>$td</td>
                    </tr>";
            $num++;
         }

         $tabla.='</table>';
         echo $tabla;
?>