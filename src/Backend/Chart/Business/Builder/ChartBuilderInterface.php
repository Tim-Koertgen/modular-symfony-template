<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\Chart\Business\Builder;

use Symfony\UX\Chartjs\Model\Chart;

interface ChartBuilderInterface
{
    /**
     * @param string $type
     * @param array $data
     * @param array|null $options
     * @return Chart
     */
    public function createChart(string $type, array $data, array $options=null): Chart;
}
