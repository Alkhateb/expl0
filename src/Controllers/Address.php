<?php
/**
 * Date: 22.09.16.
 */

namespace Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class Address extends Base
{

    public function index(Request $request, Response $response, array $args) {
        $this->render($response, 'address/index.phtml');
    }

    public function checkBalance(Request $request, Response $response, array $args) {
        $address = $args['hash'];
        $balance = 0;
        if ($address) {
            $addressModel = new \Models\Address();
            $balance = $addressModel->getAddressBalance($address);

        }

        return $response->withJson(json_encode($balance));

    }

}