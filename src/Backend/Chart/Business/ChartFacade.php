<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\Chart\Business;

use Symfony\UX\Chartjs\Model\Chart;

class ChartFacade implements ChartFacadeInterface
{
    /**
     * @var ChartBusinessFactory
     */
    private ChartBusinessFactory $factory;

    /**
     * @param ChartBusinessFactory $factory
     */
    public function __construct(ChartBusinessFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param string $type
     * @param array $data
     * @param array|null $options
     * @return Chart
     */
    public function createChart(string $type, array $data, array $options=null): Chart
    {
        return $this->factory
            ->createBuilder()
            ->createChart($type, $data, $options);
    }
}
