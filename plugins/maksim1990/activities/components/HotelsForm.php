<?php

namespace Maksim1990\Activities\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maksim1990\Activities\Models\Hotel;
use October\Rain\Support\Facades\Flash;


class HotelsForm extends ComponentBase
{

    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails()
    {
        return [
            'name' => 'Hotel form',
            'description' => 'Create new hotel'
        ];

    }

    public function onSave()
    {


        $validator = Validator::make(
            [
                'name' => Input::get('name'),
                'country' => Input::get('country'),
                'description' => Input::get('description'),
                'city' => Input::get('city')
            ],
            [
                'name' => 'required',
                'country' => 'required',
                'description' => 'required',
                'city' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
                $hotel=new Hotel;
                $hotel->name=Input::get('name');
                $hotel->country=Input::get('country');
                $hotel->description=Input::get('description');
                $hotel->city=Input::get('city');
                $hotel->hotelImage=Input::file('hotelImage');
                $hotel->save();
                Flash::success("New hotel was added!");
                return Redirect::back();
        }


    }

}