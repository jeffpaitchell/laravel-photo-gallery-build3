<?php

use Acme\repositories\StoneRepository;

use Acme\repositories\PhotoRepository;

use Models\Stone;

use Models\Stone_Photo;

use Models\Validators as Validators;

class StonesController extends BaseController {

	/**
	 * The stone model
	 *
	 * @var app\Models\Stone
	 **/
	protected $stone;

	/**
	 * The stone_photo model
	 *
	 * @var app\Models\Stone_Photo
	 **/
	protected $stone_photo;

	protected $layout = 'layouts.master';

	/**
	 * Instantiate the controller
	 *
	 * @param \app\Models\Stone $stone
	 * @param \app\Models\Stone_Photo $stone_photo
	 * @return void
	 **/
	public function __construct(StoneRepository $stone, PhotoRepository $stone_photo)
	{
		$this->stone = $stone;
		$this->stone_photo = $stone_photo;
	}

	/**
	 * Show the form for creating a new stone.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$data = array('type' => 'stone');
		$this->layout->content = \View::make('forms.new-stone', $data);
	
	}

	/**
	 * Store a newly created stone in storage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function store()
	{
		$input = \Input::all();

		$validation = new Validators\Stone;

		if($validation->passes())
		{
			$this->stone->create($input);

			return \Redirect::route('overview')
			->with('message', 'Stone Created successfully.');
		}
		else
		{
			return \Redirect::back()
            ->withInput()
            ->withErrors($validation->errors)
            ->with('message', 'Could not create stone.  Please try again.');
		}
	}

	/**
	 * Display the specified stone's photos.
	 *
	 * @param int $id Id of the stone
	 * @return \Illuminate\View\View
	 */
	public function show($id)
	{
		$stone = $this->stone->findOrFail($id);
		$stonePhotos = $this->stone_photo->findByStoneId($id);
		$this->layout->content = \View::make('home.stone', array('stone' => $stone,'stonePhotos' => $stonePhotos));
	}

	/**
	 * Show the form for editing the specified stone.
	 *
	 * @param int $id Id of the stone
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$stone = $this->stone->find($id);

		if(is_null($id))
		{
			return \Redirect::to('home.index');
		}

		$data = array('type' => 'stone', 'stone' => $stone);
		$this->layout->content = \View::make('forms.edit-stone', $data);
		
	}

	/**
	 * Update the specified stone in the database.
	 *
	 * @param int $id Id of the stone
	 * @return \Illuminate\View\View
	 */
	public function update($id)
	{
		$input = \Input::all();

        $validation = new Validators\Stone($input);

        if ($validation->passes())
        {
            $stone = Stone::find($id);
			$stone->stone_name = $input['stone_name'];
			$stone->stone_description = $input['stone_description'];
			$stone->stone_type = $input['stone_type'];
			$stone->stone_origin = $input['stone_origin'];
			$stone->stone_pattern = $input['stone_pattern'];
			$stone->stone_othername = $input['stone_othername'];
		
		/* Use the lines of code below for checkboxes to be left unchecked and 
		not generate any errors.  */	

			$stone->stone_application_kitchen = Input::get('stone_application_kitchen');	
			$stone->stone_application_bathroom = Input::get('stone_application_bathroom');
			$stone->stone_application_fireplace = Input::get('stone_application_fireplace');
			$stone->stone_application_floor = Input::get('stone_application_floor');
			$stone->stone_application_outdoor = Input::get('stone_application_outdoor');
			$stone->stone_color_black = Input::get('stone_color_black');
			$stone->stone_color_blue = Input::get('stone_color_blue');
			$stone->stone_color_brown = Input::get('stone_color_brown');
			$stone->stone_color_gold = Input::get('stone_color_gold');
			$stone->stone_color_gray = Input::get('stone_color_gray');
			$stone->stone_color_green = Input::get('stone_color_green');
			$stone->stone_color_red = Input::get('stone_color_red');
			$stone->stone_color_white = Input::get('stone_color_white');;


			$stone->stone_absorption = $input['stone_absorption'];
			$stone->stone_density = $input['stone_density'];
			$stone->stone_compression = $input['stone_compression'];
			$stone->stone_abrasion = $input['stone_abrasion'];
			$stone->stone_flex = $input['stone_flex'];
			$stone->touch();
			$stone->save();

            return \Redirect::route('show_stone', array('id' => $id));
        }
        else
        {
        	return \Redirect::route('edit_stone', array('id' => $id))
            ->withInput()
            ->withErrors($validation->errors)
            ->with('message', 'Could not edit stone.');
        }
	}

	/**
	 * Remove the specified stone from the database.
	 *
	 * @param int $id Id of the stone
	 * @return \Illuminate\View\View
	 */
	public function destroy($id)
	{
		$this->stone->delete($id);
        return \Redirect::route('overview');
	}
}