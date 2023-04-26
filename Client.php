<?PHP
class Client{
    private string $_nom;
    private array $_reservations;

    public function __construct(string $nom){
        $this->_nom = $nom;
        $this->_reservations = [];

    }

    public function getNom() :string{
        return $this->_nom;
    }    
    public function setNom($nom){
        $this->_nom = $nom;
    }

    public function addReservation(Reservation $reservation){
        $this->_reservations[] = $reservation;
    }

    /*-----------------------------------Affiche le nombre les chambres réserver-----------------------------------*/
    public function afficherReservation(){
        $NbrChambre ="";
        $prixTotal =0;
        $result ="";   

      

        echo "<h2>Réservation de $this->_nom:</h2>";

        usort($this->_reservations, function ($a, $b)
            {
                return (int) ($a->getDateDebut() > $b->getDateDebut());
            } );

        foreach($this->_reservations as $reservation){
            $result .= "Hotel: ".$reservation->getNChambre()->getHotel()."/ ".$reservation->getNChambre()." du ".$reservation->getDateDebut()->format("d-m-Y")." au ".$reservation->getDateFin()->format("d-m-Y")."<br>";
            
            $prixTotal = $prixTotal + $reservation->getNChambre()->getPrix()*intval($reservation->sejour());
            $NbrChambre++;
        }
        return $result = $NbrChambre." RÉSERVATIONS<br>".$result." Total: ".$prixTotal." €";
    }


    public function __toString(){
        return $this->_nom;
    }

}
?>