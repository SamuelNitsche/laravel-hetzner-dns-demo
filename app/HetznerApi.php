<?php

namespace App;

use Illuminate\Support\Facades\Http;

class HetznerApi
{
	protected $apiKey;

	public $baseUrl = "https://dns.hetzner.com/api/v1";


	public function __construct()
	{
		$this->apiKey = config('services.hetzner.key');
	}

	public function getAllRecords()
	{
		$data = $this->request('get', 'records')['records'];

		return collect($data)->mapInto(Record::class);
	}

	public function getRecord($record)
	{
		if ($record instanceof Record) {
			$record = $record->getId();
		}

		$data = $this->request('get', "records/{$record}")['record'];

		return new Record($data);
	}

	public function request($method, $endpoint)
	{
		return Http::withHeaders([
            'Auth-API-Token' => $this->apiKey,
        ])->$method("{$this->baseUrl}/{$endpoint}")->json();
	}
}