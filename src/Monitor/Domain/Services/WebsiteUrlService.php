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
     * @param MonitorRepository $monitorRepository
     */
    public function __construct(MonitorRepositoryInterface $monitorRepository)
    {
        $this->monitorRepository = $monitorRepository;
    }
    
    /**
     * @param array $urls
     * @return array
     */
    public function bulkSave(array $urls): array
    {
        $array = [];

        foreach ($urls as $url) {
            $model = $this->monitorRepository->create($url);
            array_push($array, $model);
        }

        return $array;
    }

}