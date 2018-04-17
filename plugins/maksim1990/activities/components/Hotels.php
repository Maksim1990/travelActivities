<?php

namespace Maksim1990\Activities\Components;

use Cms\Classes\ComponentBase;
use Maksim1990\Activities\Models\Hotel;


class Hotels extends ComponentBase
{


    public $hotels;
    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails()
    {
        return [
            'name'=>'Hotel list',
            'description'=>'List of hotels'
        ];
    }

    public function defineProperties()
    {
        return [
            'results'=>[
                'title'=>'Number of hotels',
                'description'=>'How many hotels to display',
                'default'=>0,
                'validationPattern'=>'^[0-9]+$',
                'validationMessage'=>'Only numbers are allowed'
            ],
            'sortOrder'=>[
                'title'=>'Sort hotels',
                'description'=>'Sort hotels',
                'type'=>'dropdown',
                'default'=>'name asc'
            ]
        ];
    }


    public function getSortOrderOptions(){

        return [
            'name asc'=>'Name (ascending)',
            'name desc'=>'Name (descending)'
        ];
    }

    public function onRun()
    {
     $this->hotels=$this->loadHotels();
    }

    protected function  loadHotels(){
        $query=Hotel::all();



        if($this->property('results')>0){
            if($this->property('sortOrder')=='name asc'){
                $query=$query->take($this->property('results'))->sortBy('name');
            }else{
                $query=$query->take($this->property('results'))->sortByDesc('name');
            }

        }

        return $query;
    }

}