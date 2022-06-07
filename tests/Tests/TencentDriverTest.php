<?php
/**
 * Author: jayinton
 */

namespace Tests;

use IpGeo\IpGeo;
use PHPUnit\Framework\TestCase;

class TencentDriverTest extends TestCase
{
    function testGeo()
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
        $ip = '61.140.183.172';
//        $info = $ipGeo->geo($ip);
        $info = $ipGeo->useDriver(IpGeo::DRIVER_TENCENT)->geo($ip);
        var_dump($info);
        $this->assertNotEmpty($info);
    }
}