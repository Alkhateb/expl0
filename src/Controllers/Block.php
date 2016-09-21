<?php

namespace Controllers;


use Slim\Http\Request;
use Slim\Http\Response;

class Block extends Base
{

    public function view(Request $request, Response $response, array $args) {
        $hash = $args['hash'];

        if ($hash) {
            $blockModel = new \Models\Block();
            $data = $blockModel->getBlockInfo($hash);
            $this->_view->setAttributes([
                'block_info'       => $data
            ]);
            $this->render($response, 'block/view.phtml');
        } else {
            $this->_flash->addMessage('no_hash', 'Hash not specified');
            return $response->withRedirect('/');
        }
    }

}