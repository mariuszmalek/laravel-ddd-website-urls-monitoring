<?php

declare(strict_types=1);

namespace Monitor\Services;

use Monitor\Clients\WebsiteMonitor;

class WebsiteMonitorService
{
    /**
     * @var WebsiteMonitor
     */
    protected $websiteMonitor;

    /**
     * @param WebsiteMonitor
     */
    public function __construct(WebsiteMonitor $websiteMonitor)
    {
        $this->websiteMonitor = $websiteMonitor;    
    }

    /**
     * @param string $url
     */
    public function test($url)
    {
        $this->WebsiteMonitor->connect($url);
    }
}