<?PHP
class Hotel{
    
    private string $_nom;
    private array $_address;
    private int $_nbEtoile;
    private array $_chambres;
    private array $_reservations;


    public function __construct(string $nom,array $address,int $nbEtoile){
        $this->_nom = $nom;
        $this->_address = $address;
        $this->_nbEtoile= $nbEtoile;
        $this->_reservations = [];
        $this->_chambres = [];
    }

    /*-----------------------------------Getter et Stter-----------------------------------*/
    public function getNom() :string{
        return $this->_nom;
    }    
    public function setNom($nom){
        $this->_nom = $nom;
    }
    
    public function getAddress():array{
        return $this->_address;
    }    
    public function setRealisateur($address){
        $this->_address = $address;
    }

    public function getNbEtoile():int{
        return $this->_nbEtoile;
    }    
    public function SetNbEtoile($nbEtoile) {
        $this->_nbEtoile = $nbEtoile;
    }

    public function addChambres(Chambre $chambre){
        $this->_chambres[] = $chambre;
        
    }    
    public function getReservation(){
        return $this->_reservations;
    }
    public function addReservation(Reservation $reservation){
        $this->_reservations[] = $reservation;
    }

    /*-----------------------------------Affiche le nombre les reservation-----------------------------------*/
    public function afficherReservations(){
        $result ="";

        echo "<h2>Réservation de l'hôtel $this->_nom:</h2>";
   
 
        usort($this->_reservations, function ($a, $b)
        {
            
            return (int) ($a->getDateDebut() > $b->getDateDebut());  

        } );

        foreach($this->_reservations as $reservation){
            
            $result .= $reservation->getClient().
                    " - Chambre ".$reservation->getNChambre()->getNChambre().
                    " - du ".$reservation->getDateDebut()->format("d-m-Y").
                    " - au ".$reservation->getDateFin()->format("d-m-Y")."<br>";
                
        }
            
        if($reservation->getNbrReservation()==0){
            return " Aucune réservation !";
        }else{
            return $result = $this->NbrChambreReserver()." RÉSERVATION<br>".$result."<br>";
        }    

    }

    /*-----------------------------------Affiche le nombre de chambre réserver-----------------------------------*/
    private function NbrChambreReserver(){
        $chambreReserver ="";
        foreach($this->_chambres as $chambre){   
            foreach($chambre->getReservation() as $reservation){

                $chambreReserver = $chambre->getNbrChambre()-$reservation->getNbrReservation();
            }
        }
        return  $chambreReserver;
    }

    private function NbrChambreDispo(){
        $chambreDispo ="";
        foreach($this->_chambres as $chambre){   
            $chambreDispo = $chambre->getNbrChambre()-$this->NbrChambreReserver();
        }
        return  $chambreDispo;
    }

    private function NbrChambre(){
        $nbrChambre ="";
        foreach($this->_chambres as $chambre){   
            $nbrChambre = $chambre->getNbrChambre();
        }
        return  $nbrChambre;
    }


    /*-----------------------------------Affiche les infos de l'hotel-----------------------------------*/
    public function afficherInfos(){
         $afficherEtoile ="";
         for($i=0;$i<$this->_nbEtoile;$i++){
             $afficherEtoile .= "*";
         }
         return "<h2>".$this->_nom." ".$afficherEtoile." ".$this->_address[3]."</h2>".
                 $this->_address[0]." ".$this->_address[1]." ".$this->_address[2]." ".$this->_address[3]."<br>".
                 "Nombre de chambres : ".$this->NbrChambre() ." <br>".
                 "Nombre de chambres réservées : ".$this->NbrChambreReserver()."<br>".
                 "Nombre de chambres dispo : ".$this->NbrChambreDispo() -  $this->NbrChambreReserver() ."<br>";

    }
    
    /*-----------------------------------Affiche le statues des chambres-----------------------------------*/
    public function displayStatusChambre(){
       
        ?>
        <table border='1px'>
        <th align='left'>CHAMBRE</th> 
        <th align='left'>PRIX</th>
        <th align='left'>WIFI</th>
        <th align='left'>ETAT</th>
        <?php
        foreach($this->_chambres as $chambre){
            $wifi = ($chambre->getWifi()) ? "📶" : "";
            $reserver = ($chambre->getReserver()) ? "DISPONIBLE" : "RÉSERVÉE";
            ?>
            <tr>
            <td>Chambre <?= $chambre->getNChambre() ?></td>       
            <td><?= $chambre->getPrix() ?></td>
            <td><?= $wifi ?></td>
            <td><?= $reserver ?></td>
            </tr>
            <?php

        }

        ?>
        </table>
        <?php
    }

    public function __toString(){
        $afficherEtoile ="";
        for($i=0;$i<$this->_nbEtoile;$i++){
            $afficherEtoile .= "*";
        }
        return $this->_nom." ".$afficherEtoile." ".$this->_address[3];
    }
}
?>
