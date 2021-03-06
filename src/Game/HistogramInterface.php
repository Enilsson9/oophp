<?php

namespace Edni\Game;

/**
 * A interface for a classes supporting histogram reports.
 */
interface HistogramInterface
{
    /**
     * Get max value for the histogram.
     *
     * @return int with the max value.
     */
    public function getHistogramMax();

    /**
     * Get min value for the histogram.
     *
     * @return int with the min value.
     */
    public function getHistogramMin();
}
