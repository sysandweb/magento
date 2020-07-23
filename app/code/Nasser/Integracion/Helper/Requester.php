<?php
namespace Nasser\Integracion\Helper;
use \Magento\Framework\App\Helper\AbstractHelper;
use \Magento\Framework\App\Helper\Context;
use \Magento\Framework\Exception\LocalizedException;
use \Magento\Framework\HTTP\Client\Curl ;

class Requester extends AbstractHelper{
    protected $curl;
    const ERP_API_BASE_URL='http://sysandweb.com/pruebasAPI/Nasser/pedidos';
    public function __construct(
        Context $context,
        Curl $curl){
             $this->curl=$curl;
             parent::__construct($context);
    }
    public function createPedido(array $pedido){
        $url=self::ERP_API_BASE_URL;
        $this->curl->post($url,$pedido);
        if($this->curl->getStatus()!==200){
          //  throw new LocalizedException(__('query fallo!'));
        }
        $response=json_decode($this->curl->getBody(),true);
        // if($response['success']){
        //     return $response['id_pedido'];
        // }else{
        //     //throw new LocalizedException(__($response['error_message']));
        // }
    }
}