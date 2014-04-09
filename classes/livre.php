<?php

class Livre extends Produit {
	
	/**
	 * @var int
	 */
	private $nbPage;
	
	/**
	 * Enter description here...
	 *
	 * @return int
	 */
	public function getNbPage(){
		return $this->nbPage;
	}
	
	/**
	 * Enter description here...
	 *
	 * @param int $nbPage
	 */
	public function setNbPage($nbPage){
		$this->nbPage = $nbPage;
	}
	
	/**
	 * Enter description here...
	 *
	 */
	public function toString(){
		parent::toString();
		echo "<br />Nombre de page : ".$this->nbPage;
	}
}