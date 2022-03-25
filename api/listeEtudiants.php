<?php 

                require_once('./pdo.php');
 
                header('Access-Control-Allow-Origin: *');
                header('Content-Type: application/json');

                $pdo = new Database();

                $db = $pdo->connect();

                if(isset($_GET['id'])){
                    $id = strVal($_GET['id']);
                    $query = "SELECT * FROM listedesetudiants WHERE id = '$id'";
                    $liste = $db -> query($query);

                    $etuds = array();

                    while($row = $liste->fetch()){
                        extract($row);

                        $et_item = array(
                            'id' => intVal($id),
                            'Nom' => $Nom,
                            'Prenom' => $Prenom,
                            'Classe' => $Classe,
                        );

                        //push to data
                        array_push($etuds,$et_item);
                    };
                    echo json_encode($etuds,JSON_FORCE_OBJECT);
                }
                else if(isset($_GET['Nom']))
                {

                    $nom = strVal($_GET['Nom']);
                    $query = "SELECT * FROM listedesetudiants WHERE Nom = '$nom'";
                    $liste = $db -> query($query);
                    $etuds = array();

                    while($row = $liste->fetch()){
                        extract($row);

                        $et_item = array(
                            'id' => intVal($id),
                            'Nom' => $Nom,
                            'Prenom' => $Prenom,
                            'Classe' => $Classe,
                        );

                        //push to data
                        array_push($etuds,$et_item);
                    };
                    echo json_encode($etuds,JSON_FORCE_OBJECT);
                
                }else{
                    $query = "SELECT * FROM listedesetudiants";
                    $liste = $db -> query($query);

                    $etuds = array();
                    

                    while($row = $liste->fetch()){
                        extract($row);

                        $et_item = array(
                            'id' => intVal($id),
                            'Nom' => $Nom,
                            'Prenom' => $Prenom,
                            'Classe' => $Classe,
                        );

                        //push to data
                        array_push($etuds,$et_item);
                    };
                    echo json_encode($etuds,JSON_FORCE_OBJECT);
                }

                
                

                
                
  