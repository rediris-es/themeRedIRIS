<?php

namespace  SimpleSAML\Module\themeRedIRIS;

use Twig\Environment;
use SimpleSAML\Logger;

class RedIRISController implements \SimpleSAML\XHTML\TemplateControllerInterface {

    //public function setUpTwig(Environment &$twig){
    public function setUpTwig(\Twig_Environment &$twig){
    }

    public function display(&$data){

        require_once("/var/simplesamlphp/config_inst/config/configInstitucion.php");
        
        #$data['cambiador'] = "https://sso-".NOMBRECORTO.".idpnube.rediris.es/recuperacion-credenciales";
        $data['cambiador'] = CAMBIADOR_PASS;


        $data['fondos'] = [];
        $directory = scandir("/var/simplesamlphp/config_inst/images/fondos");

        foreach ($directory as $key => $value)
        {
                if (!in_array($value,array(".","..")))
                {
                        array_push($data['fondos'], $value);
                }
        }

        $directory = scandir("/var/simplesamlphp/config_inst/images/logo");

        foreach ($directory as $key => $value)
        {
                if (!in_array($value,array(".","..","logo-feds.svg")))
                {
                        $data['logo'] = $value;
                }
        }

        syslog(LOG_LOCAL1|LOG_INFO, "**RedIRIS theme");
        Logger::debug('**RedIRIS theme');
        error_log("**RedIRIS theme");
    }
}
