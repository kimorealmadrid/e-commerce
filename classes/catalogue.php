<?php

class Catalogue{
	
	/**
	 * @var array
	 */
	private $listeProduit;
	
	/**
	 * Enter description here...
	 *
	 * @return array
	 */
	public function getListeProduit(){
		return $this->listeProduit;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param array $listeProduit
	 */
	public function setListeProduit($listeProduit){
		$this->listeProduit = $listeProduit;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param Produit $p
	 */
	public function ajoutProduit(Produit $p){
		$this->listeProduit[$p->getCode()] = $p;
	}
}

?>