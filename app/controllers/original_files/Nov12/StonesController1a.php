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
            $this->stone->update($id, $input);

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