<?php 

use app\controllers\StonesController;

use app\models\Stone;

use Acme\repositories\StoneRepository;

use app\controllers\StonePhotosController;

use app\models\Stone_Photo;

use Acme\repositories\PhotoRepository;

use app\models\Validators as Validators;

class GalleryController extends BaseController {

	/**
	 * The stone model
	 *
	 * @var \app\models\Stone
	 **/
	protected $stone;

	/**
	 * The photo model
	 *
	 * @var \app\models\Stone_Photo
	 **/
	protected $stone_photo;

	/* Added this code to include the layout */
	protected $layout = 'layouts.master';

	/**
	 * Instantiate the controller
	 *
	 * @param \app\models\Stone $stone
	 * @param \app\models\Stone_Photo $stone_photo
	 * @return void
	 **/
	public function __construct(StoneRepository $stone, PhotoRepository $stone_photo)
    {
        $this->stone = $stone;
        $this->stone_photo = $stone_photo;
    }

    /**
	 * Methods for showing
     **/

	/**
	 * Listing all stones
	 *
	 * @return \Illuminate\View\View
	 **/
	public function index()
	{
		$allStones = Stone::paginate(10);
		$this->layout->content = \View::make('home.index', array('allStones' => $allStones));
	}
}