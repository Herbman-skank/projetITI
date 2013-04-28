<?php
/**
* @package   ProjetITI
* @subpackage ProjetITI
* @author    Adrien DELANNOY
* @copyright 2013 Adrien DELANNOY
* @license    All rights reserved
*/

class defaultCtrl extends jController {
    
        /*
      * Définition des accès gérés par jAuth
      */
      public $pluginParams = array(
            '*'        => array('auth.required' => false),
            'affiche1' => array('auth.required' => true),
      );
  
    //Fonction principale, index
    function index() {
        $rep = $this->getResponse('html');

        $rep->bodyTpl = "main";

        //Ajout de balise <meta> pour le responsive design
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
      
        //test de génération d'url pour afficher les images du caroussel
        $imagefactory = jDao::get("post");
               //Création de la condition
               $condition = jDao::createConditions();
               $type_Caroussel= "Caroussel";
               $condition->addCondition('Type','=',$type_Caroussel);
               $condition->addCondition('Online','=',1);
        
        $listeimage = $imagefactory->findBy($condition);
        $rep->body->assign('IMAGES', $listeimage);
        
        
        $imagefactory2=jDao::get("post");
               $condition2 = jDao::createConditions();
               $type_Presentation= "presentation";
               $condition2->addCondition('Type','=',$type_Presentation);
               $condition2->addCondition('Online','=',1);
         $listeimage2 = $imagefactory2->findBy($condition2);
         $rep->body->assign('IMG', $listeimage2);

         $users=jDao::get("jlx_user");
         $user = $users->findAll();
         $rep->body->assign('USER', $user);
              
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
       

        return $rep;
    }
    
     function afficher_commande() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="commande";
         
        //Ajout de balise <meta> pour le responsive design
        $rep->addHeadContent('<meta name="viewport" content="width=device-width, initial-scale=1.0">');
        //CSS et JS externe
        
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'gridster/jquery.gridster.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'gridster/jquery.gridster.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style1.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'persov1.1.js');
        
        //test de génération d'url pour afficher des images
        $imagefactory = jDao::get("post");
        $image = $imagefactory->get(1);
        $rep->body->assign('IMAGES', $image);
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);
       
        $menufactory = jDao::get("produit");
        $listemenu = $menufactory->findall();
        $rep->body->assign('MENU',$listemenu);
        $rep->body->assign('IDMENU',"menu");
        
        $rep->body->assign('PATH',jApp::config()->urlengine['basePath']);

        return $rep;
        
     }
     
     function contacter() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="contact";
         
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        
        
        return $rep;
}

function creercompte() {
         $rep = $this->getResponse('html');
         
         $rep->bodyTpl ="Formulairecreercompte";
         
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'bootstrap/css/bootstrap-responsive.min.css');
        $rep->addCssLink(jApp::config()->urlengine['basePath'].'style3.css');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'jquery/jquery.js');
        $rep->addJsLink(jApp::config()->urlengine['basePath'].'bootstrap/js/bootstrap.min.js');
        
        
        return $rep;
}

function LoginUtilisateur() {
    
}










// ZONE DE TEST POUR LES LOGINS /!\




function index2(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main2';
 
    $tpl = new jTpl();
    $rep->body->assign('MAIN', '<p>Contenu de la page d\'accueil.</p>');
 
    return $rep;
  }








function affiche1(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    $tpl = new jTpl();
    $rep->body->assign('MAIN', $tpl->fetch('projetITI~affichage1'));
 
    return $rep;
  }
 
  /*
  * Cette action accepte l'affichage du template affichage2 
  * que si personne n'est connecté
  */
  function affiche2(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    // utilisation de jAuth::isConnected pour savoir si l'utilisateur
    // est actuellement identifié ou pas
    if(!jAuth::isConnected()){      
        $tpl = new jTpl();
        $rep->body->assign('MAIN', $tpl->fetch('projetITI~affichage2'));
    }else{
        $rep->body->assign('MAIN', 'L\'accès à cette page est refusé!! (si vous êtes connecté)'); 
    }
    return $rep;  	
  }
 
  /*
  * Change le mot de passe d'un user
  */ 
  function changePwd(){  
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main'; 
 
    jAuth::changePassword('user10','jelix');
    $rep->body->assign('MAIN', 'Le mot de passe du "user10" à été modifié'); 
 
    return $rep; 
  }
 
  /*
  *  Affiche tous les users
  */
  function listusers(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    $content = 'Les users enregistrés sont:<br />';
    $users = jAuth::getUserList();
    foreach($users as $user){
       $content .= $user->login . '<br />'; 
    }
    $rep->body->assign('MAIN', $content);
 
    return $rep; 
  }   
 
  /*
  * Affiche le user courrant de la session
  */  
  function getCurrentUser(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    try{
      $user = jAuth::getUserSession();
      $rep->body->assign('MAIN', "Le user courant est ".$user->login);
    }catch(Exception $e){
      $rep->body->assign('MAIN', 'Il n\'y a plus de user de connecté!');
    }
 
    return $rep; 
  }
 
  /*
  * Récupère un user
  */        
  function getUser(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    try{
      $user = jAuth::getUser('user100');
      if($user){
        $rep->body->assign('MAIN', '"user100" à été trouvé.');
      }else{
        $rep->body->assign('MAIN', '"user100" est introuvable.');
      }
    }catch(Exception $e){
      $rep->body->assign('MAIN', 'Le user user100 n\a pus être trouvé!');
    } 
 
    return $rep; 
  }
 
  /*
  * Vérifie le password d'un user
  * Peut être utilisé lors d'un login
  * Dans cet exemple le retour sera toujours un password non valide
  * parce que l'appel à cette action n'a aucun paramètre...
  */
  function verifiePwd(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    $r = jAuth::verifyPassword('user100', $this->param('password'));
    if(!$r){
      $rep->body->assign('MAIN', 'Le pwd du user100 est non valide.'); 
    }else{
      $rep->body->assign('MAIN', 'Le pwd du user100 est valide.'); 
    }
 
    return $rep; 
  }
 
  /*
  * Crée un user en session et en DB
  */
  function createUser(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    // creation d'un user avec le login tempuser et le mot de passe pwtempuser       
    $newUser = jAuth::createUserObject('tempuser','pwtempuser');
    $newUser->email = 'tempuser@cie.com';
 
    try{
      $user = jAuth::saveNewUser($newUser); 
      $rep->body->assign('MAIN', 'Le user : '. $user->login .' vient d\'être créé!'); 
    }catch(Exception $e){
      $rep->body->assign('MAIN', 'Impossible d\'ajouter ce nouvel utilisateur!');
    }   
 
    return $rep; 
  }
 
  /*
  * Met à jour un user existant
  */
  function updateUser(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    $updUser = jAuth::getUser('tempuser');
    if($updUser){
      $updUser->email = 'jelix@cie.com';
      try{
        jAuth::updateUser($updUser); 
 
        // Pour vérifier visuelement la modification	
        $user = jAuth::getUser('tempuser');
        $rep->body->assign('MAIN', 'Le nouveau courriel du user tempuser : '. $user->email);
      }catch(Exception $e){
	$rep->body->assign('MAIN', 'La mise à jour du user tempuser à échoué! ');	
      }
    }else{
      $rep->body->assign('MAIN', 'Le user tempuser n\'existe pas!');
    }
 
    return $rep;
  }
 
  /*
  * Efface un user de la session et de la DB
  */
  function deleteUser(){
    $rep = $this->getResponse('html');
    $rep->bodyTpl = 'main';
 
    if(jAuth::getUser('tempuser')){
      if(jAuth::removeUser('tempuser')){
        $rep->body->assign('MAIN', 'Le user tempuser a été effacé!');
      }else{
        $rep->body->assign('MAIN', 'Le user tempuser n\'a pas été effacé!');
      }
    }else{
      $rep->body->assign('MAIN', 'Le user tempuser n\'existe pas!');
    }
 
    return $rep;
  }
 
}