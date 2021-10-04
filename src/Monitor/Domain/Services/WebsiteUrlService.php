<?php

declare(strict_types=1);

namespace Monitor\Services;

use Monitor\Contracts\MonitorRepositoryInterface;
use Monitor\Models\Website;

class WebsiteUrlService
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
     * @param array $urls
     * @param bool $stats
     * @return array
     */
    public function bulkSave(array $urls, bool $stats = null): array
    {
        $array = [
            'collection' => [],
            'stats' => $stats
        ];

        foreach ($urls as $url) {
            $model = $this->monitorRepository->create($url, $stats);
            array_push($array['collection'], $model);
        }

        return $array;
    }

}