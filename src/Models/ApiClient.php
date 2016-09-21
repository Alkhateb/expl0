<?php
/**
 * Date: 21.09.16.
 */

namespace Models;


class ApiClient
{

    protected $_url;
    protected $_cacheInstance;

    public function __construct() {
        $this->_cacheInstance = new \Models\Cache();
    }

    public function call() {
        $cacheFileName = md5($this->_url) .  ".cache";
        $response = $this->_cacheInstance->loadCache($cacheFileName);
        if (!$response) {
            $result = null;
            $response = $this->performCurl();
            if ($response) {
                $this->_cacheInstance->saveCache($cacheFileName, $response);
                $response = json_decode($response);
            }
        } else {
            $response = json_decode($response);
        }

        return $response;
    }

    public function setEndpoint($url) {
        $this->_url = $url;
        return $this;
    }

    public function getEndpoint() {
        return $this->_url;
    }

    private function performCurl() {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $this->_url
        ));

        $resp = curl_exec($curl);

        curl_close($curl);

        return $resp;
    }

}