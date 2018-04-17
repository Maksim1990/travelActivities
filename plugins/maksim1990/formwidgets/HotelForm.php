<?php namespace Maksim1990\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Maksim1990\Activities\Models\Hotel;

/**
 * HotelForm Form Widget
 */
class HotelForm extends FormWidgetBase
{
    /**
     * @inheritDoc
     */
    protected $defaultAlias = '_maksim1990_hotel_form';

    /**
     * @inheritDoc
     */
    public function init()
    {
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        $this->prepareVars();
       // dump($this->vars['selectedValues']);
        return $this->makePartial('hotelform');
    }

    /**
     * Prepares the form widget view data
     */
    public function prepareVars()
    {
        $this->vars['id'] = $this->model->id;
        $this->vars['hotels'] = Hotel::all()->lists('name_city','id');
        $this->vars['name'] = $this->formField->getName()."[]";
        if(!empty($this->getLoadValue())) {
            $this->vars['selectedValues'] = $this->getLoadValue();
        }else {
            $this->vars['selectedValues'] = [];
        }
       // $this->vars['model'] = $this->model;
    }

    /**
     * @inheritDoc
     */
    public function loadAssets()
    {
        $this->addCss('css/select2.css', '.maksim1990');
        $this->addJs('js/select2.js', '.maksim1990');
    }

    /**
     * @inheritDoc
     */
    public function getSaveValue($hotels)
    {
        $newArray=[];

        foreach ($hotels as $hotelID){
            if(!is_numeric($hotelID)){
                $hotelArray=explode(',',$hotelID);
                $hotel= new Hotel;
                $hotel->name=(isset($hotelArray[0]) && !empty($hotelArray[0]))? $hotelArray[0]:'';
                $hotel->country=(isset($hotelArray[1]) && !empty($hotelArray[1]))? $hotelArray[1]:'';
                $hotel->city=(isset($hotelArray[2]) && !empty($hotelArray[2]))? $hotelArray[2]:'';
                $hotel->save();
                $newArray[]=$hotel->id;
            }else{
                $newArray[]=$hotelID;
            }
        }

        return $newArray;
    }
}
