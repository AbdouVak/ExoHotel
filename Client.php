<?PHP
class Client{
    private string $_nom;
    private array $_reservation;

    public function __construct(string $nom){
        $this->_nom = $nom;
        $this->_reservation = [];
    }

    public function getNom() :string{
        return $this->_nom;
    }    
    public function setNom($nom){
        $this->_nom = $nom;
    }

    public function addReservation(Reservation $reservation){
        $this->_reservation[] = $reservation;
    }

    public function afficherReservation(){
        $result ="";
        echo "<h2>Réservation de $this->_nom:</h2><br>";
        foreach($this->_reservation as $reservation){
            $result .= "Hotel: ".$reservation->getNbChambre()->getHotel()."/Chambre".$reservation->getNbChambre()." du ".$reservation->getDateDebut()->format("d-m-Y")." au ".$reservation->getDateFin()->format("d-m-Y")."<br>";
        }
        return $result."<br>";
    }

    public function __toString(){
        return $this->_nom;
    }

}
?>