<?php

declare(strict_types=1);

namespace Monitor\Services;

use Monitor\Contracts\MonitorRepositoryInterface;

class WebsiteStatisticService
{
    /**
     * @var object
     */
    protected $monitorRepository;
    
    /**
     * @var WebsiteMonitorService
     */
    protected $websiteMonitorService;

    /**
     * @param MonitorRepository $monitorRepository
     */
    public function __construct(MonitorRepositoryInterface $monitorRepository, WebsiteMonitorService $websiteMonitorService)
    {
        $this->monitorRepository = $monitorRepository;
        $this->websiteMonitorService = $websiteMonitorService;
    }

    /**
     * @param bool $stats
     */
    public function bulkStats(bool $stats = false)
    {
        return $stats;
    }

}