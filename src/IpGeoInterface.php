<?php
/**
 * Author: jayinton
 */

namespace IpGeo;

interface IpGeoInterface
{
    /**
     * @return IpGeoInterface
     */
    function setConfig($config);

    /**
     * @return IpGeoInterface
     */
    function useDriver($driver_name);

    /**
     * @param $ip
     * @return mixed
     */
    function geo($ip);
}