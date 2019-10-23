<?php
namespace Baidu\Aip\Lib;

/**
 * BCE Util
 */
class AipHttpUtil
{
    // 根据RFC 3986，除了：
    //   1.大小写英文字符
    //   2.阿拉伯数字
    //   3.点'.'、波浪线'~'、减号'-'以及下划线'_'
    // 以外都要编码
    public static $PERCENT_ENCODED_STRINGS = [
        0 => '%00',
        1 => '%01',
        2 => '%02',
        3 => '%03',
        4 => '%04',
        5 => '%05',
        6 => '%06',
        7 => '%07',
        8 => '%08',
        9 => '%09',
        10 => '%0A',
        11 => '%0B',
        12 => '%0C',
        13 => '%0D',
        14 => '%0E',
        15 => '%0F',
        16 => '%10',
        17 => '%11',
        18 => '%12',
        19 => '%13',
        20 => '%14',
        21 => '%15',
        22 => '%16',
        23 => '%17',
        24 => '%18',
        25 => '%19',
        26 => '%1A',
        27 => '%1B',
        28 => '%1C',
        29 => '%1D',
        30 => '%1E',
        31 => '%1F',
        32 => '%20',
        33 => '%21',
        34 => '%22',
        35 => '%23',
        36 => '%24',
        37 => '%25',
        38 => '%26',
        39 => '%27',
        40 => '%28',
        41 => '%29',
        42 => '%2A',
        43 => '%2B',
        44 => '%2C',
        45 => '-',
        46 => '.',
        47 => '%2F',
        48 => 0,
        49 => 1,
        50 => 2,
        51 => 3,
        52 => 4,
        53 => 5,
        54 => 6,
        55 => 7,
        56 => 8,
        57 => 9,
        58 => '%3A',
        59 => '%3B',
        60 => '%3C',
        61 => '%3D',
        62 => '%3E',
        63 => '%3F',
        64 => '%40',
        65 => 'A',
        66 => 'B',
        67 => 'C',
        68 => 'D',
        69 => 'E',
        70 => 'F',
        71 => 'G',
        72 => 'H',
        73 => 'I',
        74 => 'J',
        75 => 'K',
        76 => 'L',
        77 => 'M',
        78 => 'N',
        79 => 'O',
        80 => 'P',
        81 => 'Q',
        82 => 'R',
        83 => 'S',
        84 => 'T',
        85 => 'U',
        86 => 'V',
        87 => 'W',
        88 => 'X',
        89 => 'Y',
        90 => 'Z',
        91 => '%5B',
        92 => '%5C',
        93 => '%5D',
        94 => '%5E',
        95 => '_',
        96 => '%60',
        97 => 'a',
        98 => 'b',
        99 => 'c',
        100 => 'd',
        101 => 'e',
        102 => 'f',
        103 => 'g',
        104 => 'h',
        105 => 'i',
        106 => 'j',
        107 => 'k',
        108 => 'l',
        109 => 'm',
        110 => 'n',
        111 => 'o',
        112 => 'p',
        113 => 'q',
        114 => 'r',
        115 => 's',
        116 => 't',
        117 => 'u',
        118 => 'v',
        119 => 'w',
        120 => 'x',
        121 => 'y',
        122 => 'z',
        123 => '%7B',
        124 => '%7C',
        125 => '%7D',
        126 => '~',
        127 => '%7F',
        128 => '%80',
        129 => '%81',
        130 => '%82',
        131 => '%83',
        132 => '%84',
        133 => '%85',
        134 => '%86',
        135 => '%87',
        136 => '%88',
        137 => '%89',
        138 => '%8A',
        139 => '%8B',
        140 => '%8C',
        141 => '%8D',
        142 => '%8E',
        143 => '%8F',
        144 => '%90',
        145 => '%91',
        146 => '%92',
        147 => '%93',
        148 => '%94',
        149 => '%95',
        150 => '%96',
        151 => '%97',
        152 => '%98',
        153 => '%99',
        154 => '%9A',
        155 => '%9B',
        156 => '%9C',
        157 => '%9D',
        158 => '%9E',
        159 => '%9F',
        160 => '%A0',
        161 => '%A1',
        162 => '%A2',
        163 => '%A3',
        164 => '%A4',
        165 => '%A5',
        166 => '%A6',
        167 => '%A7',
        168 => '%A8',
        169 => '%A9',
        170 => '%AA',
        171 => '%AB',
        172 => '%AC',
        173 => '%AD',
        174 => '%AE',
        175 => '%AF',
        176 => '%B0',
        177 => '%B1',
        178 => '%B2',
        179 => '%B3',
        180 => '%B4',
        181 => '%B5',
        182 => '%B6',
        183 => '%B7',
        184 => '%B8',
        185 => '%B9',
        186 => '%BA',
        187 => '%BB',
        188 => '%BC',
        189 => '%BD',
        190 => '%BE',
        191 => '%BF',
        192 => '%C0',
        193 => '%C1',
        194 => '%C2',
        195 => '%C3',
        196 => '%C4',
        197 => '%C5',
        198 => '%C6',
        199 => '%C7',
        200 => '%C8',
        201 => '%C9',
        202 => '%CA',
        203 => '%CB',
        204 => '%CC',
        205 => '%CD',
        206 => '%CE',
        207 => '%CF',
        208 => '%D0',
        209 => '%D1',
        210 => '%D2',
        211 => '%D3',
        212 => '%D4',
        213 => '%D5',
        214 => '%D6',
        215 => '%D7',
        216 => '%D8',
        217 => '%D9',
        218 => '%DA',
        219 => '%DB',
        220 => '%DC',
        221 => '%DD',
        222 => '%DE',
        223 => '%DF',
        224 => '%E0',
        225 => '%E1',
        226 => '%E2',
        227 => '%E3',
        228 => '%E4',
        229 => '%E5',
        230 => '%E6',
        231 => '%E7',
        232 => '%E8',
        233 => '%E9',
        234 => '%EA',
        235 => '%EB',
        236 => '%EC',
        237 => '%ED',
        238 => '%EE',
        239 => '%EF',
        240 => '%F0',
        241 => '%F1',
        242 => '%F2',
        243 => '%F3',
        244 => '%F4',
        245 => '%F5',
        246 => '%F6',
        247 => '%F7',
        248 => '%F8',
        249 => '%F9',
        250 => '%FA',
        251 => '%FB',
        252 => '%FC',
        253 => '%FD',
        254 => '%FE',
        255 => '%FF'
    ];

    /**
     * 在uri编码中不能对'/'编码
     * @param  string $path
     * @return string
     */
    public static function urlEncodeExceptSlash($path)
    {
        return str_replace("%2F", "/", AipHttpUtil::urlEncode($path));
    }

    /**
     * 使用编码数组编码
     * @param  string $path
     * @return string
     */
    public static function urlEncode($value)
    {
        $result = '';
        for ($i = 0; $i < strlen($value); ++$i) {
            $result .= AipHttpUtil::$PERCENT_ENCODED_STRINGS[ord($value[$i])];
        }
        return $result;
    }

    /**
     * 生成标准化QueryString
     * @param  array $parameters
     * @return array
     */
    public static function getCanonicalQueryString(array $parameters)
    {
        //没有参数，直接返回空串
        if (count($parameters) == 0) {
            return '';
        }

        $parameterStrings = array();
        foreach ($parameters as $k => $v) {
            //跳过Authorization字段
            if (strcasecmp('Authorization', $k) == 0) {
                continue;
            }
            if (!isset($k)) {
                throw new \InvalidArgumentException(
                    "parameter key should not be null"
                );
            }
            if (isset($v)) {
                //对于有值的，编码后放在=号两边
                $parameterStrings[] = AipHttpUtil::urlEncode($k)
                    . '=' . AipHttpUtil::urlEncode((string) $v);
            } else {
                //对于没有值的，只将key编码后放在=号的左边，右边留空
                $parameterStrings[] = AipHttpUtil::urlEncode($k) . '=';
            }
        }
        //按照字典序排序
        sort($parameterStrings);

        //使用'&'符号连接它们
        return implode('&', $parameterStrings);
    }

    /**
     * 生成标准化uri
     * @param  string $path
     * @return string
     */
    public static function getCanonicalURIPath($path)
    {
        //空路径设置为'/'
        if (empty($path)) {
            return '/';
        } else {
            //所有的uri必须以'/'开头
            if ($path[0] == '/') {
                return AipHttpUtil::urlEncodeExceptSlash($path);
            } else {
                return '/' . AipHttpUtil::urlEncodeExceptSlash($path);
            }
        }
    }

    /**
     * 生成标准化http请求头串
     * @param  array $headers
     * @return array
     */
    public static function getCanonicalHeaders($headers)
    {
        //如果没有headers，则返回空串
        if (count($headers) == 0) {
            return '';
        }

        $headerStrings = array();
        foreach ($headers as $k => $v) {
            //跳过key为null的
            if ($k === null) {
                continue;
            }
            //如果value为null，则赋值为空串
            if ($v === null) {
                $v = '';
            }
            //trim后再encode，之后使用':'号连接起来
            $headerStrings[] = AipHttpUtil::urlEncode(strtolower(trim($k))) . ':' . AipHttpUtil::urlEncode(trim($v));
        }
        //字典序排序
        sort($headerStrings);

        //用'\n'把它们连接起来
        return implode("\n", $headerStrings);
    }
}