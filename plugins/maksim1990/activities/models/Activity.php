<?php namespace Maksim1990\Activities\Models;

use Model;

/**
 * Model
 */
class Activity extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'maksim1990_activities_';

    protected $jsonable=['tags'];

    //Relations
    public $belongsToMany=[
        'types'=>[
        'Maksim1990\Activities\Models\Type',
        'table'=>'maksim1990_activities_activities_types',
        'order'=>'name'
            ],
        'hotels'=>[
            'Maksim1990\Activities\Models\Hotel',
            'table'=>'maksim1990_activities_hotels_activities',
            'order'=>'name'
        ]
    ];

    public $attachOne=[
        'poster'=>'System\Models\File'
    ];
    public $attachMany=[
        'activity_gallery'=>'System\Models\File'
    ];

}
