<?php
/**
 * Author: jayinton
 */

namespace IpGeo\Driver;

use GuzzleHttp\Client;
use IpGeo\Exception\IpGeoException;

class Tencent extends Driver
{
    /**
     * @return Client
     */
    private function _getHttpClient()
    {
        return new Client([
            // Base URI is used with relative requests
            'base_uri' => '',
            // You can set any number of default request options.
            'timeout' => 5,
        ]);
    }

    /**
     * 获取key
     * @return mixed
     */
    private function takeKey()
    {
        $configs = $this->config;
        $index = rand(0, count($configs) - 1);
        return $configs[$index]['app_key'];
    }

    /**
     * @param $ip
     * @return array
     * @throws IpGeoException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function geo($ip)
    {
        if (empty($ip)) {
            throw new IpGeoException('IP不能为空');
        }
        $url = 'https://apis.map.qq.com/ws/location/v1/ip';
        $url .= '?ip=' . urlencode($ip) . '&key=' . urlencode($this->takeKey());
        //发出请求
        $http = $this->_getHttpClient();
        $reponse = $http->get($url, []);
        $body = (string)$reponse->getBody();
        $body = json_decode($body, true);
        //检查数据请求是否成功
        if ($body['status'] != 0) {
            throw new IpGeoException($body['message']);
        }

        $result = $body['result'];
        return [
            'driver' => $this->getDriverName(),
            'ip' => $ip,
            'lat' => $result['location']['lat'],//纬度
            'lng' => $result['location']['lng'],//经度
            'nation' => $result['ad_info']['nation'],//省份
            'province' => $result['ad_info']['province'],//省份
            'city' => $result['ad_info']['city'],//城市
            'district' => $result['ad_info']['district'],//地区
        ];
    }

    function getDriverName()
    {
        return 'Tencent';
    }
}