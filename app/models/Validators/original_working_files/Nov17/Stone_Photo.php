<?php namespace Models\Validators;

class Stone_Photo extends Validator {

	/**
     * The rules for validating the input
     *
     * @var array
     **/
    public static $rules = array(
    		'stone_id' => 'required',
            'photo_name' => 'required',
            'photo_description' => 'max:255',
    	);
}