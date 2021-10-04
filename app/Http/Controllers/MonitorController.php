<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonitorRequest;
use App\Http\Resources\StatisticsResource;
use App\Contracts\MonitorRepositoryInterface;
use App\Jobs\ProcessWebsiteUrlBulk;
use App\Services\{
    WebsiteUrlService,
    WebsiteStatisticService
};

class MonitorController extends Controller
{
    /** */
    private $monitorRepository;

    /** */
    private $websiteUrlService;

    private $websiteStatisticService;

    /**
     * @param MonitorRepositoryInterface $monitorRepository
     * @param WebsiteUrlService $websiteUrlService
     * @param WebsiteStatisticService $websiteStatisticService
     */
    public function __construct(
        MonitorRepositoryInterface $monitorRepository,
        WebsiteUrlService $websiteUrlService,
        WebsiteStatisticService $websiteStatisticService
        )
    {
        $this->monitorRepository = $monitorRepository;
        $this->websiteUrlService = $websiteUrlService;
        $this->websiteStatisticService = $websiteStatisticService;
    }

    /**
     * @param StoreMonitorRequest $storeMonitorRequest
     */
    public function store(StoreMonitorRequest $storeMonitorRequest)
    {
        // ProcessWebsiteUrlBulk::dispatch($storeMonitorRequest->urls, $this->websiteUrlService);
        $this->websiteUrlService->bulkSave($storeMonitorRequest->urls);

        if($storeMonitorRequest->stats) {
            $urlsArray = $this->websiteStatisticService->bulkStats($storeMonitorRequest->stats);

            $stats = $storeMonitorRequest->stats;
        
            return response($urlsArray)->header('X-Stats', $stats);
        }
    }
    
    /**
     * @param string $url
     * @return Statistics
     */
    public function show(string $url)
    {
        $statistics = $this->monitorRepository->get($url);
        return $statistics;
        return StatisticsResource::collection($statistics);
    }
}