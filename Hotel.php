<?PHP
class Hotel{
    
    private string $_nom;
    private array $_address;
    private int $_nbEtoile;
    private int $_nbChambre;
    private int $_nbChambreReserver;
    private int $_nbChambreDispo;
    private array $_chambres;


    public function __construct(string $nom,array $address,int $nbEtoile,int $nbChambre){
        $this->_nom = $nom;
        $this->_address = $address;
        $this->_nbEtoile= $nbEtoile;
        $this->_nbChambre = $nbChambre;
        $this->_chambres = [];
    }

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
    
    public function afficherReservation(){
        $result ="";
        echo "<h2>Réservation de l'hôtel $this->_nom:</h2><br>";
        foreach($this->_chambres as $chambre){
            $result .= "<br>";
        }
        return $result."<br>";
    }

    public function afficherInfo(){
        $afficherEtoile ="";
        for($i=0;$i<$this->_nbEtoile;$i++){
            $afficherEtoile .= "*";
        }
        return "<h2>".$this->_nom." ".$afficherEtoile." ".$this->_address[3]."</h2>".
                $this->_address[0]." ".$this->_address[1]." ".$this->_address[2]." ".$this->_address[3].
                "<br>Nombre de chambres : $this->_nbChambre <br>";
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
