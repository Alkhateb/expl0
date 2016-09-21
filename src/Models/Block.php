<?php
/**
 * Date: 21.09.16.
 */

namespace Models;


class Block
{

    protected $api;

    public function __construct() {
        $this->api = new BlockchainInfo();
    }

    public function getBlockInfo($height) {
        $result = $this->api->getBlockData($height);
        return $result;
    }

}