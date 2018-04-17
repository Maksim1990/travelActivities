<?php namespace Maksim1990\Activities\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Hotels extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Maksim1990.Activities', 'main-menu-item', 'side-menu-item2');
    }
}
