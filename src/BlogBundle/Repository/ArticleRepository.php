<?php

require_once __DIR__.'/../../../app/config/dbHandler.php';
require_once __DIR__.'/../Entity/article.php';

class ArticleRepository {
  private $_db;

  public function __construct() {
    $this->_db = dbHandler::getDb();
  }
    
  
  public function findAll() {
    $results = $this->_db->prepare("SELECT * FROM Article INNER JOIN User ON item_user = user_id WHERE user_id ");
    $results->execute();

    $articles_from_tables = $results->fetchAll();
    
    $articles = array();
    foreach ($articles_from_tables as $article) {
      $articles[] = new Article(
        $article['item_title'],
        $article['item_author'],
        $article['item_category'],
        $article['item_content']
      );
    }

    return $articles;
  }

  public function addArticle() {
    $results = $this->_db->prepare("INSERT INTO user (item_title, item_author, item_category, item_content) VALUES ('nomArticle','auteur','categ','contenue')");
    $results->execute();
  }
  
  public function modifArticle() {
    $results = $this->_db->prepare("UPDATE TABLE article SET item_title = 'modifiedTitle', item_author = 'modifiedAuthor', item_category = 'modifiedCateg', item_content = 'modifiedContent')");
    $results->execute();
  }

  public function deleteArticle() {
    $results = $this->_db->prepare("DELETE * FROM article WHERE item_user = user_id");
    $results->execute();
  }
}