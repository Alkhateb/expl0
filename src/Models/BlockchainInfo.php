<?php

namespace Models;

class BlockchainInfo extends ApiClient implements IExplorer
{
    const API_GET_TX = "https://blockchain.info/rawtx/#";
    const API_GET_BLOCK= "https://blockchain.info/rawblock/#";
    const API_GET_ADDR_BALANCE = "https://blockchain.info//q/addressbalance/#";


    public function getTransactionData($hash) {
        $endpoint = str_replace("#", $hash, self::API_GET_TX);
        $result = $this->setEndpoint($endpoint)->call();
        return $result;
    }


    public function getBlockData($hash) {
        $endpoint = str_replace("#", $hash, self::API_GET_BLOCK);
        $result = $this->setEndpoint($endpoint)->call();
        return $result;
    }

    public function getAddressBalance($address)
    {
        $endpoint = str_replace("#", $address, self::API_GET_ADDR_BALANCE);
        $result = $this->setEndpoint($endpoint)->call();
        return $result;
    }
}