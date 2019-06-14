<?php namespace Anomaly\InstagramExtension\Instagram;

use Abraham\InstagramOAuth\InstagramOAuth;
use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Anomaly\Streams\Platform\Addon\Plugin\PluginCriteria;
use Anomaly\Streams\Platform\Support\Collection;
use InstagramAPI\Instagram;

/**
 * Class InstagramExtensionPlugin
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class InstagramExtensionPlugin extends Plugin
{

    /**
     * Get the functions.
     *
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'instagram',
                function ($method) {
                    return new PluginCriteria(
                        'get',
                        function (Collection $options, InstagramConnection $connection) use ($method) {

                            /* @var Instagram $connection */
                            return $connection->get($method, $options->all());
                        }
                    );
                }
            ),
        ];
    }
}
