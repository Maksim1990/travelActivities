<?php

namespace Maksim1990\Contact\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use October\Rain\Exception\ValidationException;


class ContactForm extends ComponentBase
{

    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails()
    {
        return [
            'name' => 'Contact form',
            'description' => 'Simple contact form'
        ];

    }

    public function onSend()
    {

        $data=post();

        $rules = [
                'name' => 'required',
                'email' => 'required|email'
            ];

        $validator=Validator::make($data,$rules);
        if ($validator->fails()) {
          throw new ValidationException($validator);
        } else {
            $vars = ['name' => Input::get('name'), 'email' => Input::get('email'), 'content' => Input::get('content')];

            Mail::send('maksim1990.contact::mail.message', $vars, function ($message) {

                $message->to('narushevich.maksim@gmail.com', 'Admin Person');
                $message->subject('New message from contact form');

            });
        }


    }

}