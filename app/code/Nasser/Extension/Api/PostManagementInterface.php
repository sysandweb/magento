<?php
namespace Nasser\Extension\Api;
interface PostManagementInterface {
    /**
     * GET
     * @param string $megamenu_id
     * @param string $title
     * @return string
     */
    public function customGetMethod();
    /**
     * GET 
     * @param string $nombre
     * @param string $url
     * @param string $idc
     * @param string $is
     * @return string
     */
    public function customPostMethod($nombre,$url,$idc,$is);
     /**
     * PUT
     *  @param string $megamenu_id
     *  @param string $is
     *  @return string
     */
    public function customPutMethod($idmenu,$ids);
    
}