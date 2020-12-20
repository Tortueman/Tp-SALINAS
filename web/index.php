<?php


// Start the session
session_start();

if((isset($_GET['pseudo'])) && (isset($_GET['password']))) {
  $_SESSION['pseudo'] = $_GET['pseudo'];
  $_SESSION['password'] = hash('sha256',trim($_GET['password']));
} else if (isset($_GET['deco'])) {
  session_destroy();
  unset($_SESSION['pseudo']);
  unset($_SESSION['password']);
}

// Integrate the listing of articles
require_once __DIR__.'/../src/BlogBundle/Repository/articleRepository.php';
require_once __DIR__.'/../src/BlogBundle/Repository/userRepository.php';


// Global controller
class MainController {

  private $path_of_views = "../src/BlogBundle/Resources/views";
  
  public function listingAction() {

    $articles = (new ArticleRepository())->findAll();

    $response = [
        'view' => $this->path_of_views."/listing.php",
        'articles' => $articles
    ];

    return $response;

  }

  public function accueilAction() {

    $response = [
      'view' => $this->path_of_views."/accueil.php"
    ];

    return $response;
  }

  public function adminAction() {

    $response = [
      'view' => $this->path_of_views."/admin.php"
    ];

    return $response;
  }
  
  public function newuserAction() {

    $response = [
      'view' => $this->path_of_views."/newuser.php"
    ];

    return $response;
  }

  public function connexionAction() {

    $response = [
      'view' => $this->path_of_views."/connexion.php"
    ];

    return $response;
  } 

  public function defaultAction() {

    $response = [
      'view' => $this->path_of_views."/404.php"
    ];

    return $response;
  }

  public function ajouterAction() {

    $response = [
      'view' => $this->path_of_views."/ajouter.php"
    ];

    return $response;
  }

  public function addArticleAction() {
    $newArticle =  (new articleRepository())->addArticle();

    $response = [
      'view' => $this->path_of_views."/accueil.php"
    ];

    return $response;
  }

  
  public function modifArticleAction() {
    $deleteArticle =  (new articleRepository())->deleteArticle();

    $response = [
      'view' => $this->path_of_views."/accueil.php"
    ];

    return $response;
  }

  
  public function deleteArticleAction() {
    $modifyArticle =  (new articleRepository())->modifArticle();

    $response = [
      'view' => $this->path_of_views."/accueil.php"
    ];

    return $response;
  }

  public function createUserAction() {
    $createUser =  (new UserRepository())->insertUser();

    $response = [
        'view' => $this->path_of_views."/connexion.php"
    ];
    return $response;
  }
        
}


// Instanciation of the object
$action = new MainController();


// Create a new object and request to select
$users = new UserRepository();
$stockUsers = $users->findAll();

$identity = "Bonjour ";
$statut = "KO ";

if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['password']))) { 
  foreach($stockUsers as $user) {
    $getPseudo = $user->getUserPseudo();
    //$getPassword = $user->getUserPassword();
  
    if ($getPseudo === $_SESSION['pseudo']) /*&& ($getPassword === $_SESSION['password'])) */ 
    {
      $userID = $user->getUserID();
      $identity = $identity.$_SESSION['pseudo'];
      $statut = "OK";
    } 
  }
}
  
// var_dump($_GET['page']);
// var_dump($statut);
// Switch on the data get in URL

if ($statut === "OK") 
{
  if ($_GET['page'] == 'admin') 
  {
    $testBeta = $action->adminAction();
  } 
  else if ($_GET['page'] == 'listing') 
  {
    $testBeta = $action->listingAction();
  } 
  else if ($_GET['page'] == 'accueil') 
  {
    $testBeta = $action->accueilAction();
  } 
  else if ($_GET['page'] == 'ajouter') 
  {
    $testBeta = $action->ajouterAction();
  } 
  else if ($_GET['page'] == 'addArticle') 
  {
    $testBeta = $action->addArticleAction();
  } 
  else if ($_GET['page'] == 'modifArticle') 
  {
    $testBeta = $action->modifArticleAction();
  } 
  else if ($_GET['page'] == 'deleteArticle') 
  {
    $testBeta = $action->deleteArticleAction();
  } 
  else 
  {
    $testBeta = $action->defaultAction();    
  } 
} 
else if ($_GET['page'] === 'newuser')
{
  $testBeta = $action->newuserAction();
} 
else if ($_GET['page'] === 'createUser')
{
  $testBeta = $action->createUserAction();
} 
else
{
  $testBeta = $action->connexionAction();
}

// Render the view
require_once $testBeta['view'];
