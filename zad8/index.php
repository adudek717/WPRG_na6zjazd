<!--
    Trzeba jeszcze zrobic formularz!!!!!
-->


<?php

use NewCar as GlobalNewCar;

class Car{
    static $ile;
    private $model;
    private $cena;
    private $kurs;

    public function value(){
        return getCena() * getKurs();
    }

    function __to_string(){
        return print_r($this);
    }

    public function getModel(){
		return $this->model;
	}

	public function setModel($model){
		$this->model = $model;
	}

	public function getCena(){
		return $this->cena;
	}

	public function setCena($cena){
		$this->cena = $cena;
	}

	public function getKurs(){
		return $this->kurs;
	}

    public function setKurs($kurs){
		$this->kurs = $kurs;
	}

}

class NewCar extends Car{
    private $alarm;
    private $radio;
    private $climatronic;

    function __construct($model, $cena, $kurs, $alarm, $radio, $climatronic){
        parent::setModel($model);
        parent::setCena($cena);
        parent::setKurs($kurs);
        $this->setAlarm($alarm);
        $this->setRadio($radio);
        $this->setClimatronic($climatronic);
    }

    function value(){
        if($this->alarm == true){
            parent::setCena(parent::getCena()*1.05);
        }
        if($this->radio == true){
            parent::setCena(parent::getCena()*1.075);
        }
        if($this->climatronic == true){
            parent::setCena(parent::getCena()*1.1);
        }
        return parent::getCena() * parent::getKurs();
    }

    function __to_string(){
        return print_r($this);
    }

    public function getAlarm(){
		return $this->alarm;
	}

	public function setAlarm($alarm){
		$this->alarm = $alarm;
	}

	public function getRadio(){
		return $this->radio;
	}

	public function setRadio($radio){
		$this->radio = $radio;
	}

	public function getClimatronic(){
		return $this->climatronic;
	}

	public function setClimatronic($climatronic){
		$this->climatronic = $climatronic;
	}

}

class InsuranceCar extends GlobalNewCar{
    private $firstOwner;
    private $years;

    function __construct($model, $cena, $kurs, $alarm, $radio, $climatronic,$firstOwner,$years){
        parent::__construct($model, $cena, $kurs, $alarm, $radio, $climatronic);
        $this->firstOwner = $firstOwner;
        $this->years = $years;
    }

    function value(){
        parent::value();

        parent::setCena(parent::getCena()*(100-(0.01*$this->years)));
        
        if($this->firstOwner == true){
            parent::setCena(parent:getCena*0.95);
        }
        parent::setCena();
    }


}

?>
