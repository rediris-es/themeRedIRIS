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
        $passw_changer_url = getenv('PWD_CHANGER_URL', true) ?: "";
        $data['extra_info'] = 'Extra information to use in your template';
        $show_forgot_password = getenv('SHOW_FORGOT_PASSWORD', true) ?: "false";

        if ( $show_forgot_password == "true" ){
                $data['cambiador'] = $passw_changer_url;
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
