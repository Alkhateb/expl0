<?php
/**
 * Date: 21.09.16.
 */

namespace Models;


class Block extends Base
{

    protected $api;
    protected $_tableName = 'blocks';

    public function __construct() {
        $this->api = new BlockchainInfo();
        parent::__construct();
    }

    public function getBlockInfo($height) {
        $result = $this->api->getBlockData($height);
        return $result;
    }

    public function save($data) {
        // todo main_chain update fix
        parent::save($data);
    }

}