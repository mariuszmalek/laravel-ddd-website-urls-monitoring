<?php

namespace Monitor\Console\Commands;

use App\Repositories\UrlRequestRepository;
use Illuminate\Console\Command;
use Monitor\Models\Website;
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

    /**
     */
    public function __construct(WebsiteStatisticService $websiteStatisticService)
    {
        parent::__construct();
        $this->websiteStatisticService = $websiteStatisticService;
    }

    /**
     * Execute the console command.
     * @return int
     */
    public function handle()
    {
        $website = Website::all();

        $statistic = $this->websiteStatisticService->connect($website->url);
        $website->statistics()->create($statistic);

        return 0;
    }
}