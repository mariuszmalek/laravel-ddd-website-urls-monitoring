<?php

declare(strict_types=1);

namespace App\Services;

use App\Clients\WebsiteMonitor;
use App\Contracts\MonitorRepositoryInterface;
use App\Models\Website;

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