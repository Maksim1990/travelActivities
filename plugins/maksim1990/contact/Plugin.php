<?php

namespace Maksim1990\Contact;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Maksim1990\Contact\Components\ContactForm'=>'ContactForm'
        ];
    }

    public function registerSettings()
    {
    }
}
