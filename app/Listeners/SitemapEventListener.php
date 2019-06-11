<?php

namespace App\Listeners;

use App\Events\SitemapEvent;
use App\Http\Controllers\Admin\SiteMapController;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SitemapEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $sitemap;
    public function __construct(SiteMapController $SitemapClass)
    {
        $this->sitemap=$SitemapClass;
    }

    /**
     * Handle the event.
     *
     * @param  SitemapEvent  $event
     * @return void
     */
    public function handle(SitemapEvent $event)
    {
        $this->sitemap->index();
        $this->sitemap->MobileSitemap();
    }
}
