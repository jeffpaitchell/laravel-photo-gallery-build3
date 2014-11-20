<?php namespace Models\Validators;

class Stone extends Validator {

	/**
     * The rules for validating the input
     *
     * @var array
     **/
    public static $rules = array(
    		'stone_name' => 'required',
            'stone_description' => 'max:255',
    	);
}