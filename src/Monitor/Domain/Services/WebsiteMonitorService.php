<?php

declare(strict_types=1);

namespace Monitor\Services;

use GuzzleHttp\Client;

class WebsiteMonitorService
{
    /**
     * @var Client
     */
    protected $client;
    
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $url
     * @param string $timeout
     * @param string $httpErrors
     * @param int $maxRedirects
     * @param int $numberOfRedirects
     * @return Client
     */
    public function connect($url, $timeout, $httpErrors, $maxRedirects, int $numberOfRedirects = 0)
    {
        return $this->client->getAsync($url, [
            'timeout' => $timeout,
            'http_errors' => $httpErrors,
            'allow_redirects' => ['max' => $maxRedirects]
        ]);
    }
}