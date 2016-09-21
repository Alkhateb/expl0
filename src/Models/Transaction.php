<?php

namespace Models;

class Transaction
{

    protected $api;

    public function __construct() {
        $this->api = new BlockchainInfo();
    }

    public function getTransactionInfo($hash) {
        $result = $this->api->getTransactionData($hash);
        return $result;
    }

}