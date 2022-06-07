<?php
/**
 * Author: jayinton
 */

namespace Tests;

use IpGeo\Exception\IpGeoException;
use IpGeo\IpGeo;
use PHPUnit\Framework\TestCase;

class TencentDriverTest extends TestCase
{
    function _getIpGeo()
    {
        $ipGeo = new IpGeo();
        $ipGeo->setConfig([
            'driver' => 'Tencent',
            'drivers' => [
                'Tencent' => [
                    [
                        'app_key' => 'UMGBZ-Z2DRD-V5N42-HXC5B-UUXVT-67BEV',
                    ],
                    [
                        'app_key' => '4AOBZ-LYO6G-NRIQH-IBU7R-ZC5FE-ZYFNZ',
                    ]
                ],
            ]
        ]);
        return $ipGeo;
    }

    function testGeo()
    {
        $ipGeo = $this->_getIpGeo();
        $ip = '61.140.183.172';
        $info = $ipGeo->useDriver(IpGeo::DRIVER_TENCENT)->geo($ip);
        $this->assertNotEmpty($info);
    }

    function testEmptyIp()
    {
        $this->expectException(IpGeoException::class);
        $this->expectExceptionMessage('IP不能为空');
        $ipGeo = $this->_getIpGeo();
        $ip = '';
        $info = $ipGeo->useDriver(IpGeo::DRIVER_TENCENT)->geo($ip);
        $this->assertNotEmpty($info);
    }
}