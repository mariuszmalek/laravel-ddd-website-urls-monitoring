<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Models\Statistics;
use App\Models\Website;

/**
 * Interface MonitorRepositoryInterface
 */
interface MonitorRepositoryInterface
{
    /**
     * @param string $url
     * @return Website
     */
    public function create(string $url): Website;

    /**
     * @param string $url
     * @return Statistics
     */
    public function get(string $url): Statistics;
}