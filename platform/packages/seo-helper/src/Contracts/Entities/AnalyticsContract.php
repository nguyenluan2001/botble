<?php

namespace Platform\SeoHelper\Contracts\Entities;

use Platform\SeoHelper\Contracts\RenderableContract;

interface AnalyticsContract extends RenderableContract
{
    /**
     * Set Google Analytics code.
     *
     * @param string $code
     *
     * @return self
     */
    public function setGoogle($code);
}
