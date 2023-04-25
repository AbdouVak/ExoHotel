<?PHP
class Hotel{
    
    private string $_nom;
    private array $_address;
    private int $_nbEtoile;
    private int $_nbChambre;
    private int $_nbChambreDispo;    
    private int $_nbChambreReserver;
    private array $_chambres;


    public function __construct(string $nom,array $address,int $nbEtoile,int $nbChambre){
        $this->_nom = $nom;
        $this->_address = $address;
        $this->_nbEtoile= $nbEtoile;
        $this->_nbChambre = $nbChambre;
        $this->_nbChambreDispo = $nbChambre;        
        $this->_nbChambreReserver = $nbChambre;
        
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
    public function SetNbnbEtoile($nbEtoile) {
        $this->_nbEtoile = $nbEtoile;
    }

    public function getNbChambre():int{
        return $this->_nbChambre;
    }    

    public function addChambres(Chambre $chambre){
        $this->_chambres[] = $chambre;
    }

    /*-----------------------------------Affiche le nombre les reservation-----------------------------------*/
    public function afficherReservations(){
        $result ="";
        $NbrReservation=0;
        echo "<h2>Réservation de l'hôtel $this->_nom:</h2>";

        usort($this->_chambres, function ($a, $b)
            {
                return (int) ($a->getReservation()->getDateDebut() > $b->getReservation()->getDateDebut());
            } );
            
        foreach($this->_chambres as $chambre){   
            foreach($chambre->getReservation() as $reservation){
                $result .= $reservation->getClient().
                        " - Chambre ".$reservation->getNChambre()->getNChambre().
                        " - du ".$reservation->getDateDebut()->format("d-m-Y").
                        " - au ".$reservation->getDateFin()->format("d-m-Y")."<br>";
                
                $NbrReservation = $reservation->getNbrReservation();
                $this->_nbChambreDispo = $this->_nbChambre-$NbrReservation;
                }
            }
            if($NbrReservation==0){
                return " Aucune réservation !";
            }else{
                return $result = $NbrReservation." RÉSERVATION<br>".$result."<br>";
            }            
        }
        


    /*-----------------------------------Affiche le nombre de chambre réserver-----------------------------------*/
    public function NbrChambreReserver(){
        foreach($this->_chambres as $chambre){   
            foreach($chambre->getReservation() as $reservation){
                
                $NbrReservation = $reservation->getNbrReservation();

                $this->_nbChambreReserver = $this->_nbChambre-$NbrReservation;
            }
        }
        return  $this->_nbChambreReserver;
    }

    /*-----------------------------------Affiche les infos de l'hotel-----------------------------------*/
    public function afficherInfos(){
        $afficherEtoile ="";
        for($i=0;$i<$this->_nbEtoile;$i++){
            $afficherEtoile .= "*";
        }
        return "<h2>".$this->_nom." ".$afficherEtoile." ".$this->_address[3]."</h2>".
                $this->_address[0]." ".$this->_address[1]." ".$this->_address[2]." ".$this->_address[3]."<br>".
                "Nombre de chambres : $this->_nbChambre <br>".
                "Nombre de dispo : ".$this->NbrChambreReserver()."<br>".
                "Nombre de chambres : ".$this->_nbChambreDispo -  $this->NbrChambreReserver() ."<br>";

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
