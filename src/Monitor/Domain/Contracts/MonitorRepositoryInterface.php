<?php

declare(strict_types=1);

namespace Monitor\Contracts;

use Monitor\Models\Statistics;
use Monitor\Models\Website;

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