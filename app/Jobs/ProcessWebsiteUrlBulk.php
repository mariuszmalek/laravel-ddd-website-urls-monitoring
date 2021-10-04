<?php

namespace App\Jobs;

use App\Services\WebsiteUrlService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessWebsiteUrlBulk implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $urls;
    protected $websiteUrlService;

    /**
     * Create a new job instance.
     *
     * @param WebsiteUrlService $websiteUrlService
     * @return void
     */
    public function __construct(array $urls, WebsiteUrlService $websiteUrlService)
    {
        $this->urls = $urls;
        $this->websiteUrlService = $websiteUrlService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->websiteUrlService->bulkSave($this->urls);
    }
}
