<?php
// +----------------------------------------------------------------------
// | Created by PhpStorm.©️
// +----------------------------------------------------------------------
// | User: 程立弘©️
// +----------------------------------------------------------------------
// | Date: 2019-03-03 22:41
// +----------------------------------------------------------------------
// | Author: 程立弘 <1019759208@qq.com>©️
// +----------------------------------------------------------------------

namespace Lsclh\Qrcode;
use Lsclh\Fcurl\Fcurl;

/**
 * 借助第三方接口 生成二维码
 * Class QRcode
 * @package Utility\Code\QRcode
 */
class QRcode
{
    private $getUrl = 'http://api.k780.com:88/'; //第三方接口

    private $app = 'qr.get';

    /**
     * 生成二维码
     * @param $url 二维码中的数据
     * @return bool|string 返回图像数据流 可用来输出 或者 存储
     */
    public function encode($url){

        $curl = new Fcurl();
        $response = $curl->request('GET',$this->getUrl,[
            'query'=>['app'=>$this->app,'data'=>$url]
        ]);

        return $response->getBody();
    }

    private $getUrl2 = 'https://limh.me/api/qrapibig.php';

    /**
     * 返回二维码链接url
     * @param $url 二维码中的路径
     * @return string
     */
    public function encode2($url){
        return file_get_contents($this->getUrl2 . '?url='.$url.'.jpg');

    }
}
