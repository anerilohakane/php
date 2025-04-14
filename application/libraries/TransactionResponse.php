<?php

class TransactionResponse {

    private $respHashKey = "";

    /**
     * @return string
     */
    public function getRespHashKey()
    {
        return $this->respHashKey;
    }

    /**
     * @param string $respHashKey
     */
    public function setRespHashKey($respHashKey)
    {
        $this->respHashKey = $respHashKey;
    }



    public function validateResponse($responseParams)
    {
        //$str = $responseParams["mmp_txn"].$responseParams["mer_txn"].$responseParams["f_code"].$responseParams["prod"].$responseParams["discriminator"].$responseParams["amt"].$responseParams["bank_txn"];

        $str = $responseParams["mmp_txn"].$responseParams["mer_txn"].$responseParams["f_code"].$responseParams["prod"].$responseParams["discriminator"].$responseParams["amt"].$responseParams["bank_txn"];

        $signature =  hash_hmac("sha512",$str,$this->respHashKey,false);
        
        /*print_r($responseParams["signature"]);
        echo "<br><br>";
        print_r($responseParams);
        echo "<br><br>";
        print_r($signature);
        die();*/
        if($signature == $responseParams["signature"]){
            return true;
        } else {
            return false;
        }

    }
}
