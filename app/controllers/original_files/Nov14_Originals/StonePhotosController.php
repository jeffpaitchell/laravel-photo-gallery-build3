<?php 

use Acme\repositories\StoneRepository;

use Acme\repositories\PhotoRepository;

use Models\Stone;

use Models\Stone_Photo;

use Models\Validators as Validators;

class StonePhotosController extends BaseController {

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
	 * @param app\Models\Stone $stone
	 * @param app\Models\Stone_Photo $stone_photo
	 * @return void
	 **/
	public function __construct(StoneRepository $stone, PhotoRepository $stone_photo)
	{
		$this->stone = $stone;
		$this->stone_photo = $stone_photo;
	}

	/**
	 * Show the form for creating a new photo.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$stoneArray = $this->stone->all()->toArray();
		$dropdown[0] = '';

		if (empty($stoneArray)) {
			$dropdown[0] = 'There are no stones';
		}

		foreach ($stoneArray as $stone) {
		    $dropdown[$stone['stone_id']] = $stone['stone_name'];
		}

		$data = array('type' => 'stone_photo', 'dropdown' => $dropdown);
		$this->layout->content = \View::make('forms.new-photo', $data);
	}

	/**
	 * Store a newly created photo in storage.
	 *
	 * @return \Illuminate\View\View
	 */
	public function store()
	{
		$input = \Input::all();

		$validation = new Validators\Stone_Photo;

			$filename = str_random(4) . \Input::file('photo_path')->getClientOriginalName();
			$destination = "uploads/photos/";
            $upload = \Input::file('photo_path')->move($destination, $filename);

			if( $upload == false )
			{
				return \Redirect::to('home.index')
       			->withInput()
       			->withErrors($validation->errors)
       			->with('message', 'Could not upload picture');
			}

			$this->stone_photo->create($input, $filename);
			return \Redirect::route('show_stone', array('id' => $input['stone_id']));
		/*
		else
		{
			return \Redirect::route('new_photo')
            ->withInput()->withErrors($validation->errors)
            ->with('message', 'Could not upload picture. ');
		}
		*/
	}

	/**
	 * Display the specified photo.
	 *
	 * @param int $stoneId Id of the stone
	 * @param int $photoId Id of the photo
	 * @return \Illuminate\View\View
	 */
	public function show($stoneId, $photoId)
	{
		$stone_photo = $this->stone_photo->findOrFail($photoId);
		$this->layout->content = \View::make('home.stone_photo', array('stone_photo' => $stone_photo));
	}

	/**
	 * Show the form for editing the specified photo.
	 *
	 * @param int $stoneId Id of the stone
	 * @param int $photoId Id of the photo
	 * @return \Illuminate\View\View
	 */
	public function edit($stoneId, $photoId)
	{
		$stone_photo = $this->stone_photo->find($photoId);

		$stoneArray = $this->stone->all()->toArray();
		foreach ($stoneArray as $stone) {
		    $dropdown[$stone['stone_id']] = $stone['stone_name'];
		}

		$data = array('type' => 'stone_photo', 'dropdown' => $dropdown, 'stone_photo' => $stone_photo);
		$this->layout->content = \View::make('forms.edit-photo', $data);
	}

	/**
	 * Update the specified photo in the database.
	 *
	 * @param int $stoneId Id of the stone
	 * @param int $photoId Id of the photo
	 * @return \Illuminate\View\View
	 */
	public function update($stoneId, $photoId)
	{
		$input = \Input::all();

        $validation = new Validators\Stone_Photo($input);

        if ($validation->passes())
        {
            $this->stone_photo->update($photoId, $input);

            return \Redirect::route("show_stone", array('stoneId' => $stoneId, 'photoId' => $photoId));
        }
        else
        {
        	return \Redirect::route("edit_photo", array('stoneId' => $stoneId, 'photoId' => $photoId))
            ->withInput()
            ->withErrors($validation->errors)
            ->with('message', 'Could not edit photo');
        }
	}

	/**
	 * Remove the specified photo from the database.
	 *
	 * @param int $stoneId Id of the stone
	 * @param int $photoId Id of the photo
	 * @return \Illuminate\View\View
	 */
	public function destroy($stoneId, $photoId)
	{
        $this->stone_photo->delete($photoId);
        return \Redirect::route("show_stone", array('stoneId' => $stoneId));
	}
}