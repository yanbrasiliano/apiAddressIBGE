<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ResponseClientRequestService;
use App\Services\Repositories\MunicipalityService;


class GetData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */

	protected $signature = 'get:data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get data API IBGE and register in DB.';
	protected $callService;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(
		protected MunicipalityService $municipalityService
	) {
		$this->callService = $this->getCallService();
		$this->municipalityService = $municipalityService;

		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$calls = $this->callService->get();
		$this->info('Iniciando job carga banco municipios.');
		$this->insertMunicipality($calls);
		$this->info('Finalizando job carga banco municipios.');
	}

	private function getCallService(): mixed
	{
		return new ResponseClientRequestService(env('URL_API_IBGE'));
	}

	private function insertMunicipality($calls)
	{

		collect($calls['response'])->each(function ($municipality) {
			if ($this->verifyExists($municipality['id'])) {
				$this->municipalityService->store(
					[
						'district' => $municipality['nome'],
						'name' => $municipality['microrregiao']['nome'],
						'id_ibge' => $municipality['id'],
						'id_city' => $municipality['microrregiao']['id'],
					]
				);
			}
		});
	}

	private function verifyExists($id)
	{
		$result =	$this->municipalityService->find($id);
		$content = $result->getData();
		if (empty($content)) {
			return true;
		}
		return false;
	}
}
