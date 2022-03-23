<div class="container">

    <?php 
        require_once('./pdo.php');
        $pdo = new Database();
        $db = $pdo->connect();

        //confirmation edition
        if(isset($_POST['update'])){
            $ids = $_POST['ids'];
            $nameup = $_POST['name'];
            $firstnameup = $_POST['firstname'];
            $classup = $_POST['class'];
            
           $queries = "UPDATE listedesetudiants SET Nom='$nameup',Prenom='$firstnameup',Classe='$classup' WHERE id='$ids'";
            
            if($db -> query($queries)){
                header("Location: listeEtudiants.php");
            }

        }


        //remplissage formulaire 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $query = "SELECT * FROM listedesetudiants WHERE id='$id'";

            $rows = $db -> query($query);

            while($row = $rows->fetch(PDO::FETCH_ASSOC))
            {
                $id = $row['id'];
                $name = $row['Nom'];
                $firstname = $row['Prenom'];
                $class = $row['Classe'];
            };
            ?>
                
                    <form name="editform" method="post" action="edit.php" >
                        <div class="row">
                            <label for="name">Nom :</label><br>
                            <input type="text" name="name" id="name" value="<?php echo $name;?>" required>
                        </div>
                        <div class="row">
                            <label for="prenom">Prenom :</label><br>
                            <input type="text" name="firstname" value="<?php echo $firstname;?>" id="firstname" required>
                        </div>
                        <div class="row">
                            <label for="class">Classe :</label><br>
                            <input type="text" name="class" value="<?php echo $class;?>" id="class" required>
                            
                        </div>
                        <div class="row">
                            <input type="hidden" name="ids" id="ids" value="<?php echo $id;?>" required>
                            <input type="submit" name="update" value="Update">
                        </div>
                    </form>

    <?php }; ?>

</div>