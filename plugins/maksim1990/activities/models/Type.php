<?php namespace Maksim1990\Activities\Models;

use Model;

/**
 * Model
 */
class Type extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'maksim1990_activities_types';


    //Relations
    public $belongsToMany=[
        'activities'=>[
            'Maksim1990\Activities\Models\Activity',
            'table'=>'maksim1990_activities_activities_types',
            'order'=>'name'
        ]
    ];

}
