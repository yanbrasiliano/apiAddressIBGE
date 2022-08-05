<?php
namespace App\Http\Controllers;

use App\Services\Repositories\MunicipalityService;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
  protected $municipalityService;

	public function __construct(MunicipalityService $municipalityService)
	{
		$this->municipalityService = $municipalityService;
	}

	public function getAll()
	{
		return $this->municipalityService->all();
	}

	public function getByID(int $id)
	{
		return $this->municipalityService->find($id);
	}

	// public function getByFields(Request $request)
	// {
	// 	return $this->municipalityService->findWhere($request->all());
	// }

	public function register(Request $request)
	{
		return $this->municipalityService->store($request->all());
	}

	public function update(Request $request, int $id)
	{
		return $this->municipalityService->update($request->all(), $id);
	}

	public function destroy(int $id)
	{
		return $this->municipalityService->destroy($id);
	}
}
