<?php
error_reporting(0);
$lang_1 = '<p> Su clave de licencia';
$lang_2 = 'ha sido suspendido. Las posibles razones para esto incluyen: </p>
            <ul>
                <li> Su licencia está vencida en el pago </li>
                <li> Su licencia ha sido suspendida por ser utilizada en una prohibición
                    dominio </li>
                <li> Se encontró que su licencia se estaba utilizando contra el usuario final
                    Acuerdo de licencia </li>
            </ul>
            <p>
   ';
$lang_3 = 'Haga que un representante de asistencia al cliente instale una nueva clave de licencia. </p>
';
$lang_4 = 'Usuario raíz';
$lang_5 = 'Cliente';
$lang_6 = 'Master Reseller';
$lang_7 = 'Cliente';
$lang_8 = 'Dashboard';
$lang_9 = 'Facturación y soporte';
$lang_10 = 'Noticias';
$lang_11 = 'Facturación';
$lang_12 = 'Asistencia';
$lang_13 = 'Historial de correo electrónico';
$lang_14 = 'Servidores';
$lang_15 = 'Nuevo servidor';
$lang_16 = 'Nuevo distribuidor';
$lang_17 = 'Cloudflare';
$lang_18 = 'Usuarios';
$lang_19 = 'Planes';
$lang_20 = 'Base de datos maestra';
$lang_21 = 'Configuraciones';
$lang_22 = 'Actualizaciones';
$lang_23 = 'Complementos';
$lang_24 = 'Terminal';
$lang_25 = 'Mensajes';
$lang_26 = 'Archivos';
$lang_27 = 'Cronjob';
$lang_28 = 'Base de datos';
$lang_29 = 'PHP Info';
$lang_30 = 'Foro';
$lang_31 = 'Soporte';
if (isset($failsafe_offline) && $failsafe_offline) {
    $lang_32 = "<div class =' alert-warning alert 'role =' alert '>
 <h4 class = 'alert-heading'> VX  Actualización IntISP lista para instalar. </h4>
<p> Una actualización está lista para ser instalada, esta actualización puede solucionar problemas de instalación, recuperar problemas de seguridad y agregar nuevas funciones. </p>
<a href='index.php?page=update' class='btn btn-primary'> Ejecutar actualización </a>
</div> ";
} else {
    $lang_32 = "<div class =' alert-warning alert 'role =' alert '>
 <h4 class = 'alert-heading'> V '. file_get_contents (' https://httpupdate.enyrx.com/version ').' Actualización IntISP lista para instalar. </h4>
<p> Una actualización está lista para ser instalada, esta actualización puede solucionar problemas de instalación, recuperar problemas de seguridad y agregar nuevas funciones. </p>
<a href='index.php?page=update' class='btn btn-primary'> Ejecutar actualización </a>
</div> ";
}
$lang_33 = "<div class = 'alert alert-danger' role = 'alert'>
 <h4 class = 'alert-heading'> Conexión no segura </h4>
<p> La conexión al panel de control no es segura. Asegúrese de tener un certificado SSL válido y su conexión es segura. </p>
</div> ";
$lang_34 = "<div class =' notification is-danger '> Comuníquese con el servicio de asistencia si tiene problemas. Se ha alcanzado su cuota del plan. </div>
                              ";
$lang_35 = 'Estadísticas del sistema';
$lang_36 = 'Usuarios';
$lang_37 = 'Inicios de sesión fallidos';
$lang_38 = 'Tiempo en el servidor';
$lang_39 = "<div class =' alert-warning alert 'role =' alert '>
 <h4 class = 'alert-heading'> Edición de desarrollo </h4>
 <p> Esta copia de IntISP no se puede utilizar para fines de producción. Esta es solo una copia de desarrollo, si este sistema se utiliza para fines de producción. Obtenga un reembolso y póngase en contacto con piracy@enyrx.com. Gracias por su apoyo. </p>
  <p> </p>
</div> ";
$lang_40 = 'Inicios de sesión fallidos';
$lang_41 = 'Versión';
$lang_42 = 'Estado';
$lang_43 = 'Administración de energía';
$lang_44 = 'Reiniciar';
$lang_45 = 'Servidores';
$lang_46 = 'Sistema';
$lang_47 = 'Mi servidor';
$lang_48 = 'Cron Job ha sido creado';
$lang_49 = 'Tiempo';
$lang_50 = 'Archivo PHP';
$lang_51 = 'Agregar trabajo Cron';
$lang_52 = 'Comando';
$lang_53 = "<h2 class =' page-title '> Administrador de archivos </h2>
                        <p> MonstaFTP es un servicio de terceros. Ofrecemos la versión gratuita de Monsta con todas las versiones de IntISP. Si desea que los usuarios puedan editar archivos o acceder a funciones premium, deberá comprarles una licencia. Si es cliente y está viendo este mensaje, ignórelo o póngase en contacto con el administrador de este servidor web. </p>
";
$lang_54 = 'Listar usuarios';
$lang_55 = 'Nombre de usuario';
$lang_56 = 'Puerto';
$lang_57 = '<th> Asunto </th>
        <th>Message</th> <th> Delete? </th> ';
$lang_58 = 'Contraseña';
$lang_59 = 'Espacio en disco en MB';
$lang_60 = '<p> Esto puede llevar mucho tiempo. Una vez que haya creado un usuario, no salga de esta página. </p>
               ';
$lang_61 = 'Plugin';
$lang_62 = 'Versión';
$lang_63 = 'Descripción';
$lang_64 = 'Título';
$lang_65 = 'Logo';
$lang_66 = 'URL del foro';
$lang_67 = 'URL de soporte';
$lang_68 = 'Publicidad';
$lang_69 = 'Cambiar configuración';
$lang_70 = 'Iniciar sesión';
$lang_71 = '¡Nombre de usuario o contraseña incorrectos!';
$grey                                                                                                    = ' style="border-left:7px solid #bcbcbc;padding-left:12px;list-style-type:none"';
$red                                                                                                     = ' style="border-left:7px solid #dd3d36;padding-left:12px;list-style-type:none"';
$orange                                                                                                  = ' style="border-left:7px solid #ffba00;padding-left:12px;list-style-type:none"';
$green                                                                                                   = ' style="border-left:7px solid #7ad03a;padding-left:12px;list-style-type:none"';

$lang = array();
$lang['title']                                                                                           = 'Update';
$lang['DYNAMIC UPDATE SYSTEM']                                                                           = 'INTISP UPDATE SYSTEM';
$lang['ERROR']                                                                                           = 'ERROR';
$lang['Could Not Read Current-Version. Operation Aborted']                                               = 'Could Not Read Current-Version. Operation Aborted';
$lang['Could Not Read New-Versions. Operation Aborted']                                                  = 'Could Not Read New-Versions. Operation Aborted';
$lang['CURRENT VERSION']                                                                                 = 'CURRENT VERSION';
$lang['WARNING']                                                                                         = 'WARNING';
$lang['The upgrade process will affect all files and folders included in the main script installation.'] = 'The upgrade process will affect all files and folders that are being used by intisp.';
$lang['This includes all the core files used to run the script.']                                        = 'This includes all the core files used to run the Intisp and other user files.';
$lang['If you have made any modifications to those files, your changes will be lost.']                   = 'If you have made any modifications to those files, your changes will be lost.';
$lang['IMPORTANT']                                                                                       = 'IMPORTANT';
$lang['Before you perform the update, make sure to backup your database and all files!']                 = 'Before you perform the update, make sure to backup your database and all files!';
$lang['STEP']                                                                                            = 'STEP';
$lang['IMPORTANT']                                                                                       = 'IMPORTANT';
$lang['Reading Current Releases List']                                                                   = 'Reading Current Releases List';
$lang['New Update Found &mdash; Version']                                                                = 'New Update Found &mdash; Version';
$lang['Update Already Downloaded']                                                                       = 'Update Already Downloaded';
$lang['New Update Found &mdash; Version']                                                                = 'New Update Found &mdash; Version';
$lang['Downloading New Update']                                                                          = 'Downloading New Update';
$lang['Update Downloaded And Saved']                                                                     = 'Update Downloaded And Saved';
$lang['Already Downloaded File Is Outdatet']                                                             = 'Already Downloaded File Is Outdatet';
$lang['File Is Downloaded And Saved New']                                                                = 'File Is Downloaded And Saved New';
$lang['Update Already Downloaded']                                                                       = 'Update Already Downloaded';
$lang['DO']                                                                                              = 'DO';
$lang['CREATED']                                                                                         = 'CREATED';
$lang['EXECUTED']                                                                                        = 'EXECUTED';
$lang['UPDATED']                                                                                         = 'UPDATED';
$lang['Dir']                                                                                             = 'Dir';
$lang['File']                                                                                            = 'File';
$lang['Update Ready']                                                                                    = 'Update Ready';
$lang['Install Now?']                                                                                    = 'Install Now?';
$lang['READY']                                                                                           = 'READY';
$lang['Script Updated To Version']                                                                       = 'Script Updated To Version';
$lang['Check For Updates?']                                                                              = 'Check For Updates?';
$lang['INFO']                                                                                            = 'INFO';
$lang['The Newest Version Of The Script Is Version']                                                     = 'The Newest Version Of The Script Is Version';
$lang['OK']                                                                                              = 'OK';
$lang['This Is The Latest Version!']                                                                     = 'This Is The Latest Version!';
$lang['Check For Updates?']                                                                              = 'Check For Updates?';
$lang['Could Not Find Latest Releases. Operation Aborted']                                               = 'Could Not Find Latest Releases. Operation Aborted';
$lang['Could Not Read File']                                                                             = 'Could Not Read File';
$lang['Could Not Save New Update. Operation Aborted']                                                    = 'Could Not Save New Update. Operation Aborted';
$lang['Could Not Delete File']                                                                           = 'Could Not Delete File';
$lang['DELETE']                                                                                          = 'DELETE';
$lang['What\'s New']                                                                                     = 'What\'s New';
$lang['PHP 4.1 or greater is required. Operation Aborted']                                               = 'PHP 4.1 or greater is required. Operation Aborted';
$lang['Could Not Create Dir']                                                                            = 'Could Not Create Dir';
$lang['Could Not Create File']                                                                           = 'Could Not Create File';
$lang['Could Not Execute File &bdquo;upgrade.php&ldquo;. Operation Aborted']                             = 'Could Not Execute File &bdquo;upgrade.php&ldquo;. Operation Aborted';
$lang['not downloaded']                                                                                  = 'not downloaded';
$lang['Operation Aborted']                                                                               = 'Operation Aborted';
$lang['Download']                                                                                        = 'Download';
$lang['Filesize']                                                                                        = 'Filesize';
$lang['Changelog']                                                                                       = 'Changelog';
$lang['Peak Memory Usage']                                                                               = 'Peak Memory Usage';
