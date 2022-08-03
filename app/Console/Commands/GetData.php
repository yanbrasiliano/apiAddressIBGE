<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\Api\ResponseClientRequestService;

class GetData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
		protected $callService;
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
    public function __construct()
    {
				$this->callService = $this->getCallService(env('URL_API_IBGE'));
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
			
			
    }

		private function getCallService($url){
			return new ResponseClientRequestService($url);
		}

		
}
