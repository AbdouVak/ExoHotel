<?PHP
class Hotel{
    
    private string $_nom;
    private array $_address;
    private int $_nbEtoile;
    private int $_nbChambre;    
    private int $_nbChambreReserver;
    private int $_nbChambreDispo;


    public function __construct(string $nom,array $address,int $nbEtoile,int $nbChambre,int $nbChambreReserver, int $nbChambreDispo){
        $this->_nom = $nom;
        $this->_address = $address;
        $this->_nbEtoile= $nbEtoile;
        $this->_nbChambre = $nbChambre;        
        $this->_nbChambreReserver = $nbChambreReserver;
        $this->_nbChambreDispo = $nbChambreDispo;

        $this->_realisateur->setFilm($this);
        $this->_genre->addFilms($this);
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
    public function SetNbChambre($nbChambre) {
        $this->_nbChambre = $nbChambre;
    }

    public function getNbChambreReserver() :int{
        return $this->_nbChambreReserver;
    }    
    public function setNbChambreReserver($nbChambreReserver){
        $this->_nbChambreReserver = $nbChambreReserver;
    }

    public function getNbChambreDispo() :int{
        return $this->_nbChambreDispo;
    }    
    public function setNbChambreDispo($nbChambreDispo){
        $this->_nbChambreDispo = $nbChambreDispo;
    }

    
}
?>
