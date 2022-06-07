# IpGeo

获取IP的地理位置信息(所属国家、省、市、区、经纬度)

支持地图：
- 腾讯地图 https://lbs.qq.com
- TODO 百度地图
- TODO CZ88 https://www.cz88.net/help?id=free

## Install

```shell
$ composer require jayin/ipgeo -vvv
```


## Usage

```php
$ipGeo = new IpGeo();
$ipGeo->setConfig([
    'driver' => 'Tencent',
    'drivers' => [
        'Tencent' => [
            [
                'app_key' => '{app_key}',
            ]       
        ],
    ]   
]); 
$ip = '61.140.183.172';
$info = $ipGeo->geo($ip);

// 指定配置
$info = $ipGeo->useDriver('baidu')->geo($ip)
```
返回格式如下
```json
{
    "driver": "Tencent",
    "ip": "61.140.183.172",
    "lat": 23.12908,
    "lng": 113.26436,
    "nation": "中国",
    "province": "广东省",
    "city": "广州市",
    "district": ""
}
```

## Test

```shell
$  composer run test
```

## License

MIT
