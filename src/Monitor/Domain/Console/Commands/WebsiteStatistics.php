<?php

namespace Monitor\Console\Commands;

use App\Repositories\UrlRequestRepository;
use Illuminate\Console\Command;
use Monitor\Models\Website;
use Monitor\Services\WebsiteMonitorService;
use Monitor\Services\WebsiteStatisticService;

class WebsiteStatistics extends Command
{
    /**
     * @var string
     */
    protected $signature = 'monitor:website-statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gather information about every added url';

    protected $websiteMonitorService;

    /**
     * @param WebsiteMonitorService $websiteMonitorService
     */
    public function __construct(WebsiteMonitorService $websiteMonitorService)
    {
        parent::__construct();
        $this->websiteMonitorService = $websiteMonitorService;
    }

    /**
     * Execute the console command.
     * @return int
     */
    public function handle()
    {
        $website = Website::all();

        foreach($website as $item) {
            $statistic = $this->websiteMonitorService->connect($item->url, 30, false, 10);
            // TODO
            $item->statistics()->create(null);
        }

        return 0;
    }
}