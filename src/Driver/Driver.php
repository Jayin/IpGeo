<?php
/**
 * Author: jayinton
 */

namespace IpGeo\Driver;

abstract class Driver
{
    protected $config = null;

    /**
     * 驱动名称
     * @return string
     */
    abstract function getDriverName();

    /**
     * 设置配置
     * @param $config
     * @return Driver
     */
    function setConfig($config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * 根据ip获取地理位置信息
     * @param $ip
     * @return mixed
     */
    abstract function geo($ip);

}