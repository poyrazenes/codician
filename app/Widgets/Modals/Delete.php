<?php

namespace App\Widgets\Modals;

use Arrilot\Widgets\AbstractWidget;

class Delete extends AbstractWidget
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

        return view('widgets.modals.delete', [
            'config' => $this->config,
        ]);
    }
}
