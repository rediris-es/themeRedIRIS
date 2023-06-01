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
        $passw_changer = getenv('PASSW_CHANGER', true) ?: "";

        $data['extra_info'] = 'Extra information to use in your template';
        
        if ($passw_changer != ""){
                $data['cambiador'] = $passw_changer;
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
