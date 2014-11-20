<?php namespace Acme\repositories\Eloquent;

use acme\repositories\StoneRepository;

use app\models\Stone;

class EloquentStoneRepository implements StoneRepository {
	
	public function all()
	{
		return Stone::all();
	}

	public function find($id)
	{
		return Stone::find($id);
	}

	public function findOrFail($id)
	{
		return Stone::findOrFail($id);
	}

	public function create($input)
	{
		return Stone::create($input);
	}

	public function update($id, $input)
	{
        /* When using Input::, make sure the backslash is front of it
        Otherwise it will not work! */

       	$stone = Stone::find($id);
		$stone->stone_name = $input['stone_name'];
		$stone->stone_description = $input['stone_description'];
		$stone->stone_type = $input['stone_type'];
		$stone->stone_origin = $input['stone_origin'];
		$stone->stone_pattern = $input['stone_pattern'];
		$stone->stone_othername = $input['stone_othername'];
			$stone->stone_application_kitchen = \Input::get('stone_application_kitchen');	
			$stone->stone_application_bathroom = \Input::get('stone_application_bathroom');
			$stone->stone_application_fireplace = \Input::get('stone_application_fireplace');
			$stone->stone_application_floor = \Input::get('stone_application_floor');
			$stone->stone_application_outdoor = \Input::get('stone_application_outdoor');
			$stone->stone_color_black = \Input::get('stone_color_black');
			$stone->stone_color_blue = \Input::get('stone_color_blue');
			$stone->stone_color_brown = \Input::get('stone_color_brown');
			$stone->stone_color_gold = \Input::get('stone_color_gold');
			$stone->stone_color_gray = \Input::get('stone_color_gray');
			$stone->stone_color_green = \Input::get('stone_color_green');
			$stone->stone_color_red = \Input::get('stone_color_red');
			$stone->stone_color_white = \Input::get('stone_color_white');;
		$stone->stone_absorption = $input['stone_absorption'];
		$stone->stone_density = $input['stone_density'];
		$stone->stone_compression = $input['stone_compression'];
		$stone->stone_abrasion = $input['stone_abrasion'];
		$stone->stone_flex = $input['stone_flex'];
		$stone->touch();
		return $stone->save();
	}

	public function delete($id)
	{
		$stone = Stone::find($id);
		$stonePhotos = $stone->photos;
		/* Be aware of the case-sensitive declarations!!! 
		Originally had 'repositories' as 'Repositories' and it threw an error! */
		$photoRepository = \App::make('Acme\repositories\PhotoRepository');

		foreach ($stonePhotos as $photo) {
			$photoRepository->delete($photo->photo_id);
		}
		return $stone->delete();
	}

	public function forceDelete($id)
	{
		$stone = Stone::find($id);
		$stonePhotos = $stone->photos;
		$photoRepository = \App::make('Acme\Repositories\PhotoRepository');

		foreach ($stonePhotos as $photo) {
			$photoRepository->forceDelete($photo->photo_id);
		}
		return $stone->forceDelete();
	}

	public function restore($id)
	{
		$stone = Stone::withTrashed()->find($id);
		$photoRepository = \App::make('Acme\Repositories\PhotoRepository');
		$photoRepository->restoreFromStone($id);
		return $stone->restore();
	}
}