<?php declare(strict_types=1);

namespace Tests\Traits;

trait RunsBrowserStackLocal
{
    /**
     * @var Process
     */
    protected static $bs_local;

    /**
     * Start BrowserStack Local
     */
    public static function startBrowserStackLocal()
    {
        $arguments = ['key' => env('BROWSERSTACK_ACCESS_KEY')];

        if (static::$bs_local === null) {
            static::$bs_local = new \BrowserStack\Local();
            static::$bs_local->start($arguments);
        }

        static::afterClass(function () {
            if (static::$bs_local !== null) {
                static::$bs_local->stop();
            }
        });
    }
}
