<?php

namespace Omnipay\Moneris\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

/**
 * Moneris Complete Purchase Response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['message']);
    }

    public function getTransactionReference()
    {
        return isset($this->data['ref_num']) ? $this->data['ref_num'] : null;
    }
}
