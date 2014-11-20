<?php namespace Acme\Repositories\Eloquent;

use acme\repositories\PhotoRepository;

use app\models\Stone_Photo;

class EloquentPhotoRepository implements PhotoRepository {
	
	public function all()
	{
		return Stone_Photo::all();
	}

	public function find($id)
	{
		return Stone_Photo::find($id);
	}

	public function findOrFail($id)
	{
		return Stone_Photo::findOrFail($id);
	}

	public function findByStoneId($stoneId)
	{
		return Stone_Photo::where('stone_id', '=', $stoneId)->paginate(10);
	}

	public function create($input, $filename)
	{
		$newPhoto = new Stone_Photo;
		$newPhoto->photo_name = $input['photo_name'];
		$newPhoto->photo_description = $input['photo_description'];
		$newPhoto->photo_path = $filename;
		$newPhoto->stone_id = $input['stone_id'];
		return $newPhoto->save();
	}

	public function update($id, $input)
	{
		$photo = Stone_Photo::find($id);
		$photo->photo_name = $input['photo_name'];
		$photo->photo_description = $input['photo_description'];
		$photo->stone_id = $input['stone_id'];
		$photo->touch();
		return $photo->save();
	}

	public function delete($id)
	{
		$photo = Stone_Photo::find($id);
        $file = "uploads/photos/" . $photo->photo_path;
        $this->hasDeletedDir();
        rename($file, "uploads/photos/deleted/" . $photo->photo_path);
		return $photo->delete();
	}

	public function hasDeletedDir()
	{
   		return is_dir("uploads/photos/deleted/") || mkdir("uploads/photos/deleted/");
	}

	public function forceDelete($id)
	{
		$photo = Stone_Photo::find($id);
        $file = "uploads/photos/" . $photo->photo_path;
        unlink($file);
		return $photo->forceDelete();
	}

	public function restore($id)
	{
		$photo = Stone_Photo::withTrashed()->find($id);
        $deletedFile = "uploads/photos/deleted/" . $photo->photo_path;
        rename($deletedFile, "uploads/photos/" . $photo->photo_path);
		return $photo->restore();
	}

	public function restoreFromStone($stoneId)
	{
		$stonePhotos = Stone_Photo::withTrashed()->where('stone_id', $stoneId)->get();

		foreach ($stonePhotos as $photo) {
			$this->restore($photo->photo_id);
		}
	}
}