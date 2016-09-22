<?php
/**
 * Date: 22.09.16.
 */

namespace Models;


class Address extends ApiClient
{
    protected $api;

    public function __construct() {
        $this->api = new BlockchainInfo();
        parent::__construct();
    }

    public function getAddressBalance($address) {
        $result = $this->api->getAddressBalance($address);
        return $result;
    }

}