<?php namespace app\models;

class Stone extends \Eloquent {

	/**
     * The table used by this model
     *
     * @var string
     **/
    protected $table = 'stones';

    /**
     * The primary key
     *
     * @var string
     **/
    protected $primaryKey = 'stone_id';

    /**
     * The fields that are guarded cannot be mass assigned
     *
     * @var array
     **/
    protected $guarded = array();

    /**
    *  Enabling soft deleting
    *
    *  @var boolean
    **/
     protected $softDelete = true;

    /**
     * Defining the relationship, an album could have many photos
     *
     * @return \JeroenG\LaravelPhotoGallery\Models\Photo
     **/
    public function photos()
    {
    	return $this->hasMany('app\models\Stone_Photo');
    }


}






