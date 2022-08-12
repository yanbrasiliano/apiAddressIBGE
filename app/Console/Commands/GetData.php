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
		protected $callService;
		protected $municipalityService;
    protected $signature = 'get:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data API IBGE and register in DB.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MunicipalityService $municipalityService)
    {
				$this->callService = $this->getCallService(env('URL_API_IBGE'));
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
			$calls = $this->callService->get((env('URL_API_IBGE')));
			$this->register($calls);
			
    }

		private function getCallService($url){
			return new ResponseClientRequestService($url);
		}

		private function register($call){
		
			$this->getDataResponse($this->municipalityService->store(
				[
					'district' => $call['microrregiao']['nome'],
					'name' => $call['nome'],
					'id_ibge' => $call['id'],
					'id_city' => $call['microrregiao']['id']
			]
				));
		}
		
}
