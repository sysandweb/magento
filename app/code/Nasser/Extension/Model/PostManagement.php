<?php
namespace Nasser\Extension\Model;

class PostManagement 
{
     
    public function customGetMethod()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('mg_mgs_megamenu');

        // SELECT DATA 
        $fields = array('megamenu_id', 'title');
        $sql = $connection->select()
            ->from($tableName, $fields);
        $result = $connection->fetchAll($sql);

        return $result = json_encode($result);
        echo $writeConnection->lastInsertId();
        echo $result;
    }

    public function customPostMethod($nombre, $url, $idc, $is)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();

        $themeTable = $resource->getTableName('mg_mgs_megamenu');
        $sql = "INSERT INTO " . $themeTable . "
        (title, menu_type,url,category_id,sub_category_ids,
        position,columns,dropdown_position,use_thumbnail,
        left_col,right_col,status,parent_id,store) 
        VALUES ('$nombre', 1,'$url',$idc,'$is',0,1,1,2,0,0,1,1,0)";
        $connection->query($sql);
        $ultimoid = $connection->lastInsertId();
        $storeTable = $resource->getTableName('mg_mgs_megamenu_store');
        $sql1 = "INSERT INTO " . $storeTable . "
        (megamenu_id, store_id) 
        VALUES ($ultimoid,0)";
        $connection->query($sql1);
    }
    public function customPutMethod($idmenu, $ids)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $themeTable = $resource->getTableName('mg_mgs_megamenu');
        $sql = "UPDATE " . $themeTable . " SET sub_category_ids = $ids WHERE megamenu_id = $idmenu";
        $connection->query($sql);
    }
}
