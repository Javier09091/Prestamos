
<?php
/**
 * Modela para obtener las vistas que se van a ir mostrando
 */
class vistasModelo
{

    protected static function obtener_vistas_modelo($vistas)
    {
        // vistas que se van a mostrar
        $listaBlanca = ["home","client-list","client-new","client-search","client-update","client-list","company","item-list","item-new","item-search","item-update","item-new","reservation-list","reservation-new","reservation-pending","reservation-reservation","reservation-search","reservation-update","user-list","user-new","user-search","user-update"];

        if (in_array($vistas, $listaBlanca)) {

            if (is_file("./view/contenidos/" . $vistas . "-view.php")) {
                $contenido = "./view/contenidos/" . $vistas . "-view.php";
            } else {
                $contenido = "404";
            }
        } elseif ($vistas == "login" || $vistas == "index") {
            $contenido = "login";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}





?>