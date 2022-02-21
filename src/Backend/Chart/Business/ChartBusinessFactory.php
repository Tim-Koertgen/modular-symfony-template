<?php

/**
 * This file is part of Modular Symfony Template.
 * For full license information, please view the LICENSE file that was distributed with this code.
 */

namespace App\Backend\Chart\Business;

use App\Backend\Chart\Business\Builder\ChartBuilder;
use App\Backend\Chart\Business\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface as UXChartBuilderInterface;

class ChartBusinessFactory
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
     * @return ChartBuilderInterface
     */
    public function createBuilder(): ChartBuilderInterface
    {
        return new ChartBuilder(
            $this->chartBuilder,
        );
    }
}
