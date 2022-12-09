<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'header_json' => $this->headerJson(),
            'header_html' => $this->headerHtml(),
            'json_on_mobile' => $this->jsonOnMobile(),
        ];
    }


    /**
     * Returns json.
     *
     */
    public function headerJson()
    {
        return get_field('json_header_json');
    }

    /**
     * Returns HTML header.
     *
     */
    public function headerHtml()
    {
        return get_field('page_title');
    }

    /**
     * Returns an emoji per PHP session.
     *
     */
    public function jsonOnMobile()
    {
        return get_field('json_header_mobile') == 1 ? true : false ;
    }
}
