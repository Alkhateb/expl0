<?php

namespace Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class Index extends Base
{

    const SHOW_ON_HOMEPAGE = 10;


    public function index(Request $request, Response $response, array $args)
    {

        $blockModel = new \Models\Block();
        $blocks = $blockModel->selectAll(self::SHOW_ON_HOMEPAGE);

        $this->_view->setAttributes([
            'blocks' => array_reverse($blocks),
        ]);

        $this->render($response, 'index.phtml');

    }

}