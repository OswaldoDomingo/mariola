<?php

class Config {
    public static $mvc_bd_hostname = "localhost";
    public static $mvc_bd_nombre = "mariola";
    public static $mvc_bd_usuario = "mariola";
    public static $mvc_bd_clave = "mariola";
    // public static $mvc_vis_css = "style.css";
    public static $mvc_vis_css = ["style.css", "estillogin.css", "stylephp.css", "css-modificado.css"];
    public static function cargarCss() {
        foreach (self::$mvc_vis_css as $cssFile) {
            echo '<link rel="stylesheet" type="text/css" href="' . $cssFile . '">';
        }
    
    // public static $vista = __DIR__ . '/../templates/inicio.php';
    
    
}
}
?>