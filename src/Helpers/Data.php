<?php

namespace Helpers;

class Data
{

    public function getTransactionOutput($tx) {
        $sum = 0;
        foreach ($tx->out as $output) {
            $sum += (int)$output->value;
        }

        return $sum;
    }

    public function getTransactionInput($tx) {
        $sum = 0;
        foreach ($tx->inputs as $output) {
            $sum += (int)$output->prev_out->value;
        }

        return $sum;
    }

    public function getTransactionFees($tx) {
        $in = (int) $this->getTransactionInput($tx);
        $out = (int) $this->getTransactionOutput($tx);
        $fee = $in - $out;
        return $fee;
    }

    public function toBtc($satoshi) {
        return (float) $satoshi / 100000000;
    }
}