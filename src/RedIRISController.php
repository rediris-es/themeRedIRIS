<?php

namespace  SimpleSAML\Module\themeRedIRIS;

use Twig\Environment;
use SimpleSAML\XHTML\TemplateControllerInterface;
use SimpleSAML\Logger;

class RedIRISController implements TemplateControllerInterface
{

    //public function setUpTwig(Environment &$twig){
    public function setUpTwig(Environment &$twig): void{
    }

    public function display(array &$data): void
    {
        define("CAMBIADOR_PASS", "https://micambiador.es");

        $data['extra_info'] = 'Extra information to use in your template';
        
        if (CAMBIADOR_PASS != ""){
                $data['cambiador'] = CAMBIADOR_PASS;
        }

        $data['fondos'] = [];
        $directory = scandir("/var/simplesamlphp/config_inst/images/fondos");

        foreach ($directory as $key => $value)
        {
                if (!in_array($value,array(".","..","base")))
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
