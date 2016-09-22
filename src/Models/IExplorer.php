<?php

namespace Models;

interface IExplorer {

    public function getTransactionData($hash);

    public function getBlockData($hash);

    public function getAddressBalance($address);

}