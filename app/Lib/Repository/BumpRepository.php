<?php
App::uses('AppModel', 'Model');
App::uses('Bump', 'Model');
App::uses('BumpForMySql', 'Model');

class BumpRepository {
  public function __construct($dest) {
    if (strcmp($dest, 'mysql') == 0) {
      $this->Model = new BumpForMySql();
    } else {
      $this->Model = new Bump();
    }
  }
  
  public function fetchPage($page, $limit, $offset) {
    return $this->Model->fetchPage($page, $limit, $offset);
  }
  
  public function findById($id) {
    return $this->Model->findById($id);
  }
  
  public function save($bo) {
    $this->Model->save($bo);
    return (isset($bo['bump_id'])) ? $bo['bump_id'] : $this->Model->getLastInsertID();
  }
  
  public function doList($page, $limit, $offset) {
    echo 'doList'; exit();
  }
}
?>