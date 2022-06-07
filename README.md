# IpGeo

A template repository for PHP composer package.

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
    'driver' => 'baidu',
    'drivers' => [
        'baidu' => [
            [
                'app_key' => '{app_key}',
                'secret_key' => '{secret_key}',
            ]
        ],
        'Tencent' => [
            [
            'app_key' => '{app_key}',
            'secret_key' => '{secret_key}',
            ]       
        ],
        'amap' => [
            [
                'app_key' => '{app_key}',
                'secret_key' => '{secret_key}',
            ]
        ]
    ]   
]); 
$ip = '127.0.0.1';
$info = $ipGeo->geo($ip);

// 指定配置
$info = $ipGeo->useDriver('baidu')->geo($ip)
```

## Test

```shell
$  composer run test
```

## License

MIT
