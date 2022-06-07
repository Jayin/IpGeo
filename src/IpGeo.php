<?php
/**
 * Author: jayinton
 */

namespace IpGeo;

use IpGeo\Driver\Driver;
use IpGeo\Exception\IpGeoException;

class IpGeo implements IpGeoInterface
{

    protected $config = [];
    protected $current_driver = '';


    const DRIVER_AUTO = 'Auto';
    const DRIVER_TENCENT = 'Tencent';

    /**
     * @param $config
     * @return IpGeoInterface
     */
    function setConfig($config)
    {
        $this->config = $config;
        $this->current_driver = $config['driver'];
        return $this;
    }

    /**
     * @param $driver_name
     * @return IpGeoInterface
     */
    function useDriver($driver_name)
    {
        $this->current_driver = $driver_name;
        return $this;
    }


    function geo($ip)
    {
        if (empty($this->current_driver)) {
            throw new IpGeoException('参数异常');
        }
        $driver = $this->takeDriver($this->current_driver);
        $driver->setConfig($this->takeConfig($this->current_driver));

        return $driver->geo($ip);
    }

    /**
     * @param $driver_name
     * @return Driver
     */
    private function takeDriver($driver_name)
    {
        $class = '\IpGeo\\Driver\\' . $driver_name;
        return new $class;
    }

    private function takeConfig($driver_name)
    {
        return $this->config['drivers'][$driver_name];
    }

}