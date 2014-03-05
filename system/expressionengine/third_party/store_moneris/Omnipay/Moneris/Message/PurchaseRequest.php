<?php

namespace Omnipay\Moneris\Message;
/**
 * Moneris Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{

    public function getData()
    {
        $this->validate('amount', 'returnUrl');

        $data = array();
        $data['hpp_id'] = $this->getHppId();
        $data['hpp_key'] = $this->getHppKey();
        $data['return_url'] = $this->getReturnUrl();
        $data['amount'] = $this->getAmount();


        if ($this->getCard()) {
            $data['cardholder'] = $this->getCard()->getName();
            $data['avs_street_number'] = $this->getCard()->getAddress1();
            $data['avs_street_name'] = $this->getCard()->getAddress2();
            $data['avs_zipcode'] = $this->getCard()->getPostcode();
        }

        return $data;
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }
}