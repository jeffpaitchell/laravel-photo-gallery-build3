<?php namespace Acme\repositories;

interface PhotoRepository {
	
	public function all();

	public function find($id);

	public function findOrFail($id);

	public function findByStoneId($stoneId);

	public function create($input, $filename);

	public function update($id, $input);

	public function delete($id);

	public function forceDelete($id);

	public function restore($id);

	public function restoreFromStone($stoneId);
}