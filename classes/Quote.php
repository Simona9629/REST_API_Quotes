<?php

class Quote {
    private $id;
    private $quote;
    private $domain;
    
    public function __construct($quote, $domain) {
        $this->quote = $quote;
        $this->domain = $domain;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getQuote() {
        return $this->quote;
    }

    public function getDomain() {
        return $this->domain;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setQuote($quote){
        $this->quote = $quote;
    }

    public function setDomain($domain){
        $this->domain = $domain;
    }



}
