<?PHP
class Chambre{
    private int $_nChambre;
    private Hotel $_hotel;
    private int $_lits;
    private int $_prix;
    private bool $_wifi;
    private bool $_reserver = false;
    private array $_reservation;

    public function __construct(Hotel $hotel,int $nChambre,int $lits, int $prix,bool $wifi){
        $this->_hotel = $hotel;
        $this->_nChambre = $nChambre;
        $this->_lits = $lits;
        $this->_prix = $prix;
        $this->_wifi = $wifi;
        $this->_reserver = true;
        $this->_reservation =[];

        $this->_hotel->addChambres($this);
    }

    public function getNChambre(){
        return $this->_nChambre;
    }
    public function seNChambre($nChambre){
        $this->_nChambre = $nChambre;
    }

    public function getHotel(){
        return $this->_hotel;
    }
    public function setHotel(Hotel $hotel){
        $this->_hotel = $hotel;
    }
    public function addReservation(Reservation $reservation){
        $this->_reservation[] = $reservation;
    }

    public function __toString(){
        $wifi="";
        if($this->_wifi){
            $wifi="oui";
        }else{
            $wifi="non";
        }
        return "Chambre:".$this->_nChambre .
                "(".$this->_lits."lits -".
                $this->_prix." € - Wifi ". 
                $wifi." )";
    }

}
?>