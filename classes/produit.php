<?php

class Produit implements Article{

	/**
	 * @var string
	 */
	private $code;
	
	/**
	 * @var string
	 */
	private $descriptif;
	
	/**
	 * @var float
	 */
	private $prix;
	
	/**
	 * @var int
	 */
	private $quantite;
	
	/**
	 * Enter description here...
	 *
	 * @param string $code
	 * @param string $descriptif
	 * @param float $prix
	 */
	public function __construct($code = "", $descriptif = "", $prix = ""){
		$this->code = $code;
		$this->descriptif = $descriptif;
		$this->prix = $prix;
	}
	
	/**
	 * Enter description here...
	 *
	 * @return string
	 */
	public function getCode(){
		return $this->code;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param string $code
	 */
	public function setCode($code){
		$this->code = $code;
	}
	
	/**
	 * Enter description here...
	 *
	 * @return string
	 */
	public function getDescriptif(){
		return $this->descriptif;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param string $descriptif
	 */
	public function setDescriptif($descriptif){
		$this->descriptif = $descriptif;
	}
	
	/**
	 * Enter description here...
	 *
	 * @return float
	 */
	public function getPrix(){
		return $this->prix;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param float $prix
	 */
	public function setPrix($prix){
		$this->prix = $prix;
	}
	
	/**
	 * Enter description here...
	 *
	 * @return int
	 */
	public function getQuantite(){
		return $this->quantite;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param int $quantite
	 */
	public function setQuantite($quantite){
		$this->quantite = $quantite;
	}
	
	/**
	 * Enter description here...
	 *
	 */
	public function toString(){
		echo "Code : ".$this->code."<br />Descriptif : ".$this->descriptif."<br />Prix : ".$this->prix;
		
	}
	
	/**
	 * Enter description here...
	 *
	 */
	public function affichePrix(){
		echo "prix : ".$this->prix;
	}
}