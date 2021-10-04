<?php

declare(strict_types=1);

namespace Monitor\Services;

use Monitor\Clients\WebsiteMonitor;
use Monitor\Contracts\MonitorRepositoryInterface;
use Monitor\Models\Website;

class WebsiteStatisticService
{
    /**
     * @var object
     */
    protected $monitorRepository;

    /**
     * @var WebsiteMonitor
     */
    protected $websiteMonitor;

    /**
     * @param MonitorRepository $monitorRepository
     */
    public function __construct(MonitorRepositoryInterface $monitorRepository, WebsiteMonitor $websiteMonitor)
    {
        $this->monitorRepository = $monitorRepository;
        $this->websiteMonitor = $websiteMonitor;
    }

    /**
     * @param bool $stats
     */
    public function bulkStats(bool $stats = false)
    {
        $this->websiteMonitor;
        return $stats;
    }

}