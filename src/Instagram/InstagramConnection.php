<?php namespace Anomaly\InstagramExtension\Instagram;

use InstagramAPI\Instagram;

/**
 * Class InstagramConnection
 *
 * This is a singleton bound to the
 * pre-configured InstagramOauth class.
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class InstagramConnection
{

    /**
     * The instagram connection.
     *
     * @var Instagram
     */
    protected $connection;

    /**
     * Create a new InstagramConnection instance.
     *
     * @param Instagram $connection
     */
    public function __construct(Instagram $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get the connection.
     *
     * @return Instagram
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Pass methods through.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return call_user_func_array([$this->connection, $name], $arguments);
    }

}
