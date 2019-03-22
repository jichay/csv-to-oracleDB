<?php

class Ec extends CI_Model {

        public $idEc;
        public $fidResponsable;
        public $nbCredit;
        public $dateCreation;
        public $dateModification;
        public $libelleEc;
        public $typeEnseignantCm;
        public $typeEnseignantTd;
        public $effectifCm;
        public $effectifTd;
        public $effectifTp;
        public $volumeHeureCm;
        public $volumeHeureTd;
        public $volumeHeureTp;
       	public $volumeHeureStage;
       	public $volumeHeureMemoire;
       	public $volumeHeurePerso;
        public $volumeHeureDistant;
        public $codeLmd2;
        public $fidDip;
        public $modaliteEnseignement;
       	public $externe;
       	public $codElp;
       	public $codCmp;
       	public $annee;

       	public function setData($obj){
       		$this->idEc = $obj->ID_EC;
	        $this->fidResponsable = $obj->FID_RESPONSABLE;
	        $this->nbCredit = $obj->NB_CREDIT;
	        $this->dateCreation = $obj->D_CREATION;
	        $this->dateModification = $obj->D_MODIFICATION;
	        $this->libelleEc = $obj->LIBELLE_EC;
	        $this->typeEnseignantCm = $obj->TYPE_ENSEIGNANT_CM;
	        $this->typeEnseignantTd = $obj->TYPE_ENSEIGNANT_TD;
	        $this->effectifCm = $obj->EFFECTIF_CM;
	        $this->effectifTd = $obj->VOLUME_HEURE_TD;
	        $this->effectifTp = $obj->EFFECTIF_TP;
	        $this->volumeHeureCm = $obj->VOLUME_HEURE_CM;
	        $this->volumeHeureTd = $obj->VOLUME_HEURE_TD;
	        $this->volumeHeureTp = $obj->VOLUME_HEURE_TP;
	       	$this->volumeHeureStage = $obj->VOLUME_HEURE_STAGE;
	       	$this->volumeHeureMemoire = $obj->VOLUME_HEURE_MEMOIRE;
	       	$this->volumeHeurePerso = $obj->VOLUME_HEURE_PERSO;
	        $this->volumeHeureDistant = $obj->VOLUME_HEURE_DISTANT;
	        $this->codeLmd2 = $obj->CODE_LMD2;
	        $this->fidDip = $obj->FID_DIP;
	        $this->modaliteEnseignement = $obj->MODALITE_ENSEIGNEMENT;
	       	$this->externe = $obj->EXTERNE;
	       	$this->codElp = $obj->COD_ELP;
	       	$this->codCmp = $obj->COD_CMP;
	       	$this->annee = $obj->ANNEE;
       	}
        
}

?>