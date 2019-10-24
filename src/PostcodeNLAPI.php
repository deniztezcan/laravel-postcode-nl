<?php

namespace DenizTezcan\LaravelPostcodeNLAPI;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class PostcodeNLAPI
{
	private $client;
	private $baseUrl = 'https://api.postcode.eu';

	public function __construct()
	{
		$credentials = base64_encode(config('postcodenl.api.key') . ':' . config('postcodenl.api.secret'));

        $this->client = new Client([
            'headers' => [
                'Authorization' => 'Basic ' . $credentials,
                'Content-type' => 'application/json',
                'Charset' => 'utf-8'
            ],
        ]);
	}

	public function validateDutch(
		string $postalcode = "",
		string $houseNr = "",
		string $houseNrExt = ""
	) {
		return $this->parseResponse($this->client->get($this->baseUrl . "/nl/v1/addresses/postcode/" . $postalcode . "/" . $houseNr . "/" . $houseNrExt));
	}

	private function parseResponse(ResponseInterface $response)
	{
		if (null === $response) {
            throw new RuntimeException('Invalid response');
        }

        if ($response->getStatusCode() !== 200) {
            throw new RuntimeException("Request error: HTTP {$response->getStatusCode()}");
        }

        return json_decode($response->getBody()->getContents());
	}

}