<?php

declare(strict_types=1);

namespace Monitor\Services;

use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;

class WebsiteMonitorService
{
    /**
     * @var Client
     */
    protected $client;

    private $totaltime = 0;
    
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
            'allow_redirects' => ['max' => $maxRedirects],
            'on_stats' => function (TransferStats $stats) {
                $this->setTotaltime($stats->getTransferTime());
            } 
        ]);
    }

    public function getTotaltime()
    {
        return $this->totaltime;
    }
    
    public function setTotaltime($time)
    {
        $this->totaltime = $time;
    }
}