<?php
use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

$userIdentity = $this->request->getAttribute('identity');
$usersTable =TableRegistry::getTableLocator()->get('Users');
$historiqueTable =TableRegistry::getTableLocator()->get('Historique');
$user = $usersTable->get($userIdentity->id);
?>

<H1>Historique de <?= $user->username ?></H1>

<br>
<?php
$dsn = 'mysql:host=9x7xl.myd.infomaniak.com;dbname=9x7xl_testbackup';
$username = '9x7xl_romain';
$password = 'Clarinette03.';

try {
    $pdo = new PDO($dsn, $username, $password);

    // Configuration pour générer des exceptions en cas d'erreur
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour obtenir la valeur de la colonne 'api'
    $stmt = $pdo->prepare("SELECT api FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $userIdentity->id, PDO::PARAM_INT);
    $stmt->execute();

    // Récupération du résultat
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Affichage de la valeur de 'api'
    echo '<p>Ma clef d\'api : '. $result['api'].'</p>';

} catch (PDOException $e) {
    // Gestion des erreurs PDO
    echo "Erreur PDO : " . $e->getMessage();
}
// Affichage des paris
$historiques = $historiqueTable->findByRefUsers($userIdentity->id)->order(['id' => 'DESC']);

echo '<table class="table table-striped w-75"> <thead>
<tr>
  <th class="fs-2" scope="col">Date</th>
  <th class="fs-2" scope="col">Variation</th>
</tr>
</thead><tbody>';
foreach ($historiques as $historique) {

    echo'<tr>';
    echo '<td class="fs-3">'.$historique->date.'</td>';
    echo  '<td class="fs-3">'.htmlentities($historique->description).'</td>';

}
echo '</tbody></table>';

?>

<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box; 
}
        main {
            padding: 2em;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            margin: 0;
        }

        table {
            border-collapse: collapse;
            max-width: 50em;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 2;
        }   
        tr:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        th, td {
            color: #fff;
        }
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
    z-index: -1;
}

.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
.header,ul {
    background: rgba(255,255,255,0.13);
}
h1,p{
    color: #fff;
}
    </style>