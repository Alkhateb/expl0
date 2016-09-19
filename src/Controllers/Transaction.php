<?php
/**
 * Date: 19.09.16.
 */

namespace Controllers;




use Slim\Http\Request;
use Slim\Http\Response;

class Transaction extends Base
{

    public function view(Request $request, Response $response, array $args) {
        $hash = $args['hash'];

        if ($hash) {
            echo $hash;
            return;
        }

        $this->_flash->addMessage('no_hash', 'Hash not specified');
        return $response->withRedirect('/');
    }

}