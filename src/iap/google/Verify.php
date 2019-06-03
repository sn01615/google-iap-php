<?php


namespace sn01615\iap\google;


class Verify
{

    private $public_key;

    public function __construct($public_key = null)
    {
        $this->setPublicKey($public_key);
    }

    public function setPublicKey($public_key)
    {
        $this->public_key = $public_key;
        return $this;
    }

    /**
     * @param string $data 客户端回传的 INAPP_PURCHASE_DATA 对应的数据
     * @param string $signature 客户端回传的 INAPP_DATA_SIGNATURE 对应的数据
     * @return int
     */
    public function verify($data, $signature)
    {
        $google_public_key = $this->public_key;
        $public_key = "-----BEGIN PUBLIC KEY-----\n" . chunk_split($google_public_key, 64, "\n") . "-----END PUBLIC KEY-----";
        $public_key_handle = openssl_get_publickey($public_key);
        $result = openssl_verify($data, base64_decode($signature), $public_key_handle, OPENSSL_ALGO_SHA1);
        return $result;
    }
}