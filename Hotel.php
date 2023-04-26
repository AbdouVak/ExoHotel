<?PHP
class Hotel{
    
    private string $_nom;
    private string $_addresse;
    private int $_nbEtoile;
    private array $_chambres;
    private array $_reservations;


    public function __construct(string $nom,string $addresse,int $nbEtoile){
        $this->_nom = $nom;
        $this->_addresse = $addresse;
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
    
    public function getAddress():string{
        return $this->_addresse;
    }    
    public function setRealisateur($address){
        $this->_addresse = $address;
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
        echo "<h2>Réservation de l'hôtel $this:</h2>";
   
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
            
        if($this->NbrChambreReserver()>0){
            return $result = $this->NbrChambreReserver()." RÉSERVATIONS<br>".$result."<br>";
            
        }else{
            return " Aucune réservation !";
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
        return   $this->NbrChambre()- $this->NbrChambreReserver() ;
    }

    private function NbrChambre(){
        return count($this->_chambres);
    }


    /*-----------------------------------Affiche les infos de l'hotel-----------------------------------*/
    public function afficherInfos(){
        $addresse = explode(" ", $this->_addresse);
        $addresse = str_replace($addresse[count($addresse)-1],strtoupper($addresse[count($addresse)-1]),$addresse);
        $addresse = implode(" ", $addresse);

         return "<h2>$this</h2>".
                  $addresse."<br>".
                 "Nombre de chambres : ".$this->NbrChambre() ." <br>".
                 "Nombre de chambres réservées : ".$this->NbrChambreReserver()."<br>".
                 "Nombre de chambres dispo : ".$this->NbrChambreDispo()."<br>";

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
        echo "<h2>Statuts des chambres de $this </h2>";
        foreach($this->_chambres as $chambre){
            $wifi = ($chambre->getWifi()) ? "📶" : "";
            $reserver = ($chambre->getReserver()) ? "RÉSERVÉE" : "DISPONIBLE";
            ?>
            <tr>
            <td>Chambre <?= $chambre->getNChambre() ?></td>       
            <td align='center'><?= $chambre->getPrix() ?></td>
            <td align='center'><?= $wifi ?></td>
            <td><?= $reserver ?></td>
            </tr>
            <?php
        }
        ?>  
        </table>
        <?php
    }

    public function __toString(){
        $ville = explode(" ", $this->_addresse);

        $afficherEtoile ="";
        for($i=0;$i<$this->_nbEtoile;$i++){
            $afficherEtoile .= "*";
        }
        return $this->_nom." ".$afficherEtoile." ".$ville[count($ville)-1];
    }
}
?>
