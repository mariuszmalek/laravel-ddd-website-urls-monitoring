<?php

declare(strict_types=1);

namespace Monitor\Http\Controllers;

use Monitor\Http\Requests\StoreMonitorRequest;
use Monitor\Http\Resources\StatisticsResource;
use Monitor\Contracts\MonitorRepositoryInterface;
use Monitor\Services\{
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
        $array = $this->websiteUrlService->bulkSave($storeMonitorRequest->urls, $storeMonitorRequest->stats);

        return response($array['collection'])->header('X-Stats', $array['stats']);
    }
    
    /**
     * @param string $url
     * @return Statistics
     */
    public function show(string $url)
    {
        $statistics = $this->monitorRepository->get($url);
        return StatisticsResource::collection($statistics);
    }
}