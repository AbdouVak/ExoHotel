<h1>Exercice Cinema</h1>

<p>A partir de ces captures d’écran, réaliser l’application en POO permettant la gestion de réservations de chambres par des clients dans différents hôtels :</p>

<h2>Résultat</h2>


<?PHP
include('Hotel.php');
include('Client.php');
include('Chambre.php');
include('Reservation.php');

$addr_Hilton=array("10","route de la Gare","67000","Strasbourg");
$Hilton = new Hotel("Hilton",$addr_Hilton,3,10);

$GeorgeL = new Client("George LUCAS");
$chambre_GL = new Chambre($Hilton,3,2,120,true);
$reserv_GL = new Reservation($GeorgeL,$chambre_GL,"2020-01-01","2020-12-01");

echo $GeorgeL->afficherReservation();
?>