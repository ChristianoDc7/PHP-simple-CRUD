<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
            <?php 
                require_once('./pdo.php');

                $pdo = new Database();

                $db = $pdo->connect();

                if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['class']) )
                {
                    $nom = $_POST['name'];
                    $prenom = $_POST['firstname'];
                    $classe = $_POST['class'];
                    
                    

                    $query = "INSERT INTO listedesetudiants (Nom , Prenom , Classe) VALUES ('$nom','$prenom','$classe') ";
                    if($db -> exec($query)){
                        echo 'Etudiant ajouté';
                    };
                }else {
                    echo '<h1>Liste des etudiants</h1>';
                }
            ?>
            <table>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Classe</th>
                    <th colspan="2">Actions</th>
                </tr>
                    <?php 
                        $query = "SELECT * FROM listedesetudiants";
                        $liste = $db -> query($query);
                        while($list = $liste->fetch()){
                            echo "<tr>";
                            echo '<td>'.$list['id'].'</td><td>'.$list['Nom'].'</td><td>'.$list['Prenom'].'</td><td>'.$list['Classe'];
                            echo "<td><a href='edit.php?id=$list[id]'>Edit</a> </td> <td> <a href='delete.php?id=$list[id]' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                            echo "</tr>";
                        }
                        
                    ?>
                
            </table>
    </div>
</body>
</html>