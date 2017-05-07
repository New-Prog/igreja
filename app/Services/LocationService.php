<?php
namespace App\Services;


use GuzzleHttp\Client;

class LocationService
{
	protected $key;
	protected $client;
	public function __construct()
	{
		$this->key = env('API_GOOGLE');

		$this->client = new Client([
			'headers' => $this->getHeaders(),
		]);
	}


	public function getCordinates($address)
	{
		$parameters = [
				'address' => $address,
				'key' => $this->key
		];

		$response = json_decode($this->client->request('GET', "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$this->key}")->getBody(), true);
		return count($response['results']) > 0 ? $response['results'][0]['geometry']['location'] : []	;
	}

	/**
	 * @return array
	 */
	public function getHeaders()
	{
		return [
				'Content-Type' => 'application/json',
		];
	}
}
