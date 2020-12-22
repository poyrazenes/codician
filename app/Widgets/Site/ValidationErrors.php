<?php

namespace App\Widgets\Site;

use Arrilot\Widgets\AbstractWidget;

class ValidationErrors extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        //

        return view('widgets.site.validation_errors', [
            'config' => $this->config,
        ]);
    }
}
