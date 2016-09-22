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

    // hash VARCHAR(50), height INTEGER, created_at datetime,
    // relayed_by varchar(20), size decimal, transactions integer, total decimal
    public function save(Request $request, Response $response, array $args) {
        $params = $request->getParams();
        $request->getParams();
        if (!$params['hash'] || !$params['height'] || !$params['size']
            || !$params['transactions'] || !$params['total']) {
            // todo return error
            return;
        }

        $nowDate = date('Y-m-d H:i:s');
        $data = [
            'hash'                  => $params['hash'],
            'height'                => $params['height'],
            'total'                 => $params['total'],
            'size'                  => $params['size'],
            'transactions'          => $params['transactions'],
            'created_at'            => $nowDate,
        ];

        $res = $this->getModel('\Models\Block')->save($data);

        if ($res) {
            $this->_flash->addMessage('success', 'Transaction saved!');
        }
    }

}