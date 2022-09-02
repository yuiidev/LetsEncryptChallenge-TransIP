<?php

namespace MozoDev\LetsEncrypt;

class WellKnownUpdater
{
    public function updateWellKnown(): bool {
        if(!is_dir('/var/www/html/.well-known/acme-challenge')) {
            mkdir('/var/www/html/.well-known/acme-challenge', 0770, true);
        }

        $file = fopen("/var/www/html/.well-known/acme-challenge/{$_SERVER['CERTBOT_VALIDATION']}", 'w');
        fwrite($file, $_SERVER['CERTBOT_VALIDATION']);
        fclose($file);

        return true;
    }
}