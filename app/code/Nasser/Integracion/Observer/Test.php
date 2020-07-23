<?php
namespace Nasser\Integracion\Observer;
use Magento\Framework\Event\ObserverInterface;
class Test implements ObserverInterface{
 
    protected $_logger;
    protected $_requester;
    protected $_messageManager;
    protected $_order;
   
    public function __construct(
         \Psr\Log\LoggerInterface $logger,
         \Nasser\Integracion\Helper\Requester $requester,
         \Magento\Framework\Message\ManagerInterface $messageManager,
         \Magento\Sales\Model\Order $order
    )
    {
        $this->_logger=$logger;
        $this->_requester=$requester;
        $this->_messageManager = $messageManager;
        $this->_order=$order;

    }
      public function execute(\Magento\Framework\Event\Observer $observer){
         // $this->_messageManager->addNotice(__('Hola este es un mensaje en el front '));
         
        // $id_pedido = $observer->getEvent()->getOrderIds();
        // $pedido = $this->_order->load($id_pedido);
         //$id_cliente = $pedido->getCustomerId(); 
         // $nombre_cliente=$pedido->getCustomerName();
         //$data=$pedido->getData();
        //die();
        //insertar medinate la api
         //$erpId = $this->_requester->createPedido([]);
       
    }
}

  