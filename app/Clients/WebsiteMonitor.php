<?php

declare(strict_types=1);

namespace App\Clients;

use GuzzleHttp\Client;

class WebsiteMonitor
{
    /**
     * @var Client
     */
    protected $client;

    protected $timeout;
    protected $httpErrors;
    protected $maxRedirects;
    protected $numberOfRedirects;
    
    public function __construct($timeout, $httpErrors, $maxRedirects, int $numberOfRedirects = 0)
    {
        $this->client = new Client();

        $this->timeout = $timeout;
        $this->httpErrors = $httpErrors;
        $this->maxRedirects = $maxRedirects;
        $this->numberOfRedirects = $numberOfRedirects;
    }

    public function connect($url)
    {
        return $this->client->getAsync($url, [
            'timeout' => $this->timeout,
            'http_errors' => $this->httpErrors,
            'allow_redirects' => ['max' => $this->maxRedirects]
        ]);
    }
}