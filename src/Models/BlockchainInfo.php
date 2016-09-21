<?php

namespace Models;

class BlockchainInfo extends ApiClient implements IExplorer
{
    const API_GET_TX = "https://blockchain.info/rawtx/#";
    const API_GET_BLOCK= "https://blockchain.info/rawblock/#";


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
}