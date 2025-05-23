<?php

namespace  SimpleSAML\Module\themeRedIRIS;

use Twig\Environment;
use SimpleSAML\XHTML\TemplateControllerInterface;
use SimpleSAML\Logger;

class RedIRISController implements TemplateControllerInterface
{
    public function setUpTwig(Environment &$twig): void{
    }

    public function display(array &$data): void
    {
        $passw_changer_local = getenv('PASSW_CHANGER_LOCAL', true) ?: "";
        $passw_changer_remoto = getenv('PASSW_CHANGER_REMOTE', true) ?: "";
        $passw_changer_type = getenv('PASSW_CHANGER_TYPE', true) ?: "";

        $data['extra_info'] = 'Extra information to use in your template';
        
        if ($passw_changer_type == "local" && $passw_changer_local != ""){
                $data['cambiador'] = $passw_changer_local;
        }
        elseif($passw_changer_type == "remote" && $passw_changer_remoto != ""){
                $data['cambiador'] = $passw_changer_remoto;
        }

        $data['fondos'] = [];

       //$directory = scandir("/var/simplesamlphp/config_inst/images/fondos");
        $directory = scandir("/var/simplesamlphp/modules/themeRedIRIS/public/assets/images/fondos");
        
        foreach ($directory as $key => $value)
        {
                if (!in_array($value,array(".","..","base")))
                {
                        array_push($data['fondos'], $value);
                }
        }

        #$directory = scandir("/var/simplesamlphp/config_inst/images/log");
        $directory = scandir("/var/simplesamlphp/modules/themeRedIRIS/public/assets/images/logo");

        foreach ($directory as $key => $value)
        {
                if (!in_array($value,array(".","..","logo-feds.svg")))
                {
                        $data['logo'] = $value;
                }
        }

        // Se comenta esta linea pero se puede usar para depurar
        // syslog(LOG_LOCAL1|LOG_INFO, "**RedIRIS theme**");

    }

   
}
