<?php

class EcTable extends CI_Model {

        public $ID_EC; //number
        public $FID_RESPONSABLE; //number
        public $NB_CREDIT; //number
        public $EFFECTIF_CM; //number
        public $D_CREATION; //date
        public $D_MODIFICATION; //date
        public $LIBELLE_EC; //varchar
        public $TYPE_ENSEIGNANT_CM; //varchar
        public $TYPE_ENSEIGNANT_TD; //varchar
        public $CODE_LMD2; //varchar
        public $FID_DIP; //number
        public $MODALITE_ENSEIGNEMENT; //varchar
        public $EFFECTIF_TD; //number
        public $EFFECTIF_TP; //number
        public $VOLUME_HEURE_CM; //number
        public $VOLUME_HEURE_TD; //number
        public $VOLUME_HEURE_TP; //number
       	public $VOLUME_HEURE_STAGE; //number
       	public $VOLUME_HEURE_MEMOIRE; //number
       	public $VOLUME_HEURE_PERSO; //number
        public $VOLUME_HEURE_DISTANT; //number
       	public $EXTERNE; //varchar
       	public $COD_ELP; //varchar
       	public $COD_CMP; //varchar
       	public $ANNEE; //number
        
        public function setData($dataArr){
            $dataArr = $this->convertData($dataArr);                      
            $keyArr = get_object_vars($this);
            $index = 0;
            foreach($keyArr as $key => $value){
                $this->{$key} = $dataArr[$index];
                $index++;
            }
        }

        private function getDataAsArray(){
            $keyArr = get_object_vars($this);
            $index = 0;
            foreach($keyArr as $key => $value){
                $arr[$key] = $value;
                $index++;
            }
            return $arr;
        }

        public function saveDB(){
            $this->load->database();
            $data = $this->getDataAsArray();
            if(!$this->db->insert('EC', $data)) {
                throw new Exception("Insert Error");
            }
        }

        public function numberOfAtt(){
            $data = get_object_vars($this);
            return count($data);
        }

        private function convertData($dataArr){
            $dataType = array('integer', 'integer', 'integer', 'integer', 'date', 'date', 'string', 'string', 'string', 'string', 'integer', 'string', 'integer', 'integer', 'integer', 'integer', 'integer', 'integer', 'integer', 'integer', 'integer', 'string', 'string', 'string', 'integer');
            $i = 0;
            foreach($dataArr as $value){
                if(is_numeric($value) || $dataType[$i] == "integer"){
                    $dataArr[$i] = intval($value);
                } else if ($dataType[$i] == "date"){
                    $dataArr[$i] = $value;
                } else if ($dataType[$i] == "string" && $value == ''){
                    $dataArr[$i] = '';
                }
                $i++;
            }
            return $dataArr;
        }

}

?>