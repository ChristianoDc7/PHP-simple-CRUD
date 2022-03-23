<?php
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Etudiant</title>
    </head>
    <body>
        <div class="container">
            <form action="listeEtudiants.php" method="POST">
                <div class="row">
                    <label for="name">Nom :</label><br>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="row">
                    <label for="prenom">Prenom :</label><br>
                    <input type="text" name="firstname" id="firstname" required>
                </div>
                <div class="row">
                    <label for="class">Classe :</label><br>
                    <input type="text" name="class" id="class" required>
                </div>
                <div class="row">
                    <button type="submit" >
                        Envoyer
                    </button>
                </div>
            </form>
        </div>
    </body>
    </html>