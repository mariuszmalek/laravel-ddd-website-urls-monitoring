<?php

declare(strict_types=1);

namespace Monitor\Repositories;

use Monitor\Contracts\MonitorRepositoryInterface;
use Monitor\Models\Statistics;
use Monitor\Models\Website;
use Illuminate\Contracts\Queue\Monitor;

/**
 * class MonitorRepository
 */
class MonitorRepository implements MonitorRepositoryInterface
{
    /**
     * @param string $url
     * @return Website
     */
    public function create(string $url): Website
    {
        return Website::firstOrCreate(['url' => $url]);
    }

    public function createMany()
    {
        
    }

    /**
     * @param string $url
     * @param int $timeLimit
     * @return Statistics
     */
    public function get(string $url, int $timeLimit = 10): Statistics
    {
        return Website::where('url', $url)->whereHas('statistics', function ($query) use ($timeLimit) {
            return $query->where('created_at', '>',  now()->subMinutes($timeLimit));
        })->first();

        // return $website->statistics()->where($website->stats()->createdAt(), '>', now()->subMinutes($timeLimit))->latest()->get([
        //     'created_at as time',
        //     'total_loading_time as loadingTime',
        //     'redirects_count as redirectCount'
        // ]);
    }
}