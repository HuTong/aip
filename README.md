# baiduAip
百度aip sdk 提取成命名空间方式

~~~
$image = file_get_contents('a.jpg');
$options = [
    'brief' => '1',
    'tags' => '1,2'
];

$result = (new AipImageSearch($appId, $appKey,$appSecret))->similarAdd($image, $options);
~~~