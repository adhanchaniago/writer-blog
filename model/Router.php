<?php

namespace OpenClassrooms\Blog\Model;

require_once('./index.php');
require('controler/frontend.php');

class Router 
{
    public function direct()
    {
        

        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'listPosts') {
                    listPosts();
                }
                elseif ($_GET['action'] == 'post') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        post();
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'addComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'register') {
                    //if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email'])) {
                        register($_POST['pseudo'], $_POST['pass'], $_POST['email']);
                    /*}
                    else {
                        throw new Exception('Pour vous inscrire, veuillez remplir tous les champs');
                    }*/
                }
                elseif ($_GET['action'] == 'login') {
                    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
                    {
                        echo 'Bonjour ' . $_SESSION['pseudo'];
                    }
                    else {
                        throw new Exception('test');
                    }
                }
        
            }
            else {
                listPosts();
            }
        }
        catch(Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}

