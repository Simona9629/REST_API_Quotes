<?php


class QuoteDAO {
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function getDB() {
        return $this->db;
    }
    
    public function get() {
        $this->db->prepareStatement("SELECT * FROM quote ORDER BY RAND() LIMIT 1");
        return $this->db->single();
    }
    
    public function getById($id){
        $this->db->prepareStatement("SELECT * FROM quote WHERE id = :id");
        $this->db->bind(':id', $id);
        
        return $this->db->single();
    }
    
    public function getByDomain($domain){
        $this->db->prepareStatement("SELECT * FROM quote WHERE domain = :domain ORDER BY RAND() LIMIT 1");
        $this->db->bind(':domain', $domain);
        
        return $this->db->single();
    }
    
    public function add(Quote $q){
        $this->db->prepareStatement("INSERT INTO quote VALUES(:id, :quote, :domain)");
        $this->db->bind(':id',NULL);
        $this->db->bind(':quote', $q->getQuote());
        $this->db->bind(':domain', $q->getDomain());
        
        return $this->db->executeReturnId();
    }
}
