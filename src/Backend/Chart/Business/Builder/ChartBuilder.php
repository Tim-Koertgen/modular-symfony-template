<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\Chart\Business\Builder;

use Symfony\UX\Chartjs\Builder\ChartBuilderInterface as UXChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartBuilder implements ChartBuilderInterface
{
    /**
     * @var UXChartBuilderInterface
     */
    private UXChartBuilderInterface $chartBuilder;

    /**
     * @param UXChartBuilderInterface $chartBuilder
     */
    public function __construct(UXChartBuilderInterface $chartBuilder)
    {
        $this->chartBuilder = $chartBuilder;
    }

    /**
     * @param string $type
     * @param array $data
     * @param array|null $options
     * @return Chart
     */
    public function createChart(string $type, array $data, array $options=null): Chart
    {
        $chart = $this->chartBuilder->createChart($type);

        $chart->setData($data);

        if ($options === null) {
            $chart->setOptions($this->getDefaultOptions());
        } else {
            $chart->setOptions($options);
        }

        return $chart;
    }

    /**
     * @return array
     */
    private function getDefaultOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
        ];
    }
}
