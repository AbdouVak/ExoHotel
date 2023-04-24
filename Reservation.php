<?PHP
class Reservation{
    private Chambre $_nChambre;
    private Client $_client;
    private DateTime $_dateDebut;
    private DateTime $_dateFin;

    public function __construct(Client $client,Chambre $nChambre,string $dateDebut,string $dateFin){
        $this->_client = $client;
        $this->_nChambre = $nChambre;
        $this->_dateDebut = new DateTime($dateDebut);
        $this->_dateFin = new DateTime($dateFin);

        $this->_client->addReservation($this);
        $this->_nChambre->addReservation($this);
    }

    public function getNbChambre(){
        return $this->_nChambre;
    }
    public function setNbChambre($nChambre){
        $this->_nChambre = $nChambre;
    }

    public function getClient(){
        return $this->_client;
    }
    public function setClient($client){
        $this->_client = $client;
    }

    public function getDateDebut(){
        return $this->_dateDebut;
    }
    public function setDateDebut($dateDebut){
        $this->_dateDebut = $dateDebut;
    }

    public function getDateFin(){
        return $this->_dateFin;
    }
    public function seDateFin($dateFin){
        $this->_dateFin = $dateFin;
    }


}
?>