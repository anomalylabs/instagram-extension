<?php namespace Anomaly\InstagramExtension;

use Abraham\InstagramOAuth\InstagramOAuth;
use Anomaly\InstagramExtension\Instagram\InstagramConnection;
use Anomaly\InstagramExtension\Instagram\InstagramExtensionPlugin;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use InstagramAPI\Instagram;

/**
 * Class InstagramExtensionServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class InstagramExtensionServiceProvider extends AddonServiceProvider
{

    /**
     * The addon plugins.
     *
     * @var array
     */
    protected $plugins = [
        InstagramExtensionPlugin::class,
    ];

    /**
     * Boot the addon.
     */
    public function boot()
    {

        /**
         * Setup our pre-configured Instagram instance alias.
         */
        if (config('anomaly.extension.instagram::instagram.username')) {
            $this->app->singleton(
                InstagramConnection::class,
                function () {

                    $instagram = new Instagram();

                    $instagram->login(
                        config('anomaly.extension.instagram::instagram.username'),
                        config('anomaly.extension.instagram::instagram.password')
                    );

                    return new InstagramConnection($instagram);
                }
            );
        }
    }

}
