<?php

namespace App\Widgets\Site;

use Arrilot\Widgets\AbstractWidget;

class Header extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [
        'active' => 'home'
    ];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $active = $this->config['active'];

        return view('widgets.site.header', [
            'active' => $active
        ]);
    }
}
