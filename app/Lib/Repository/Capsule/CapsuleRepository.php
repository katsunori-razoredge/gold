<?php

App::uses('AppModel', 'Model');
App::uses('Capsule', 'Model');
App::uses('CapsuleForMySql', 'Model');

//class CapsuleRepository {
class CapsuleRepository extends AppModel {
  public function __construct($dest) {
    if (strcmp($dest, 'mysql') == 0) {
      $this->Capsule = new CapsuleForMySql();
    } else {
      $this->Capsule = new Capsule();
    }
  }
  
  public function fetchPage($page, $limit, $offset) {
    return $this->Capsule->fetchPage($page, $limit, $offset);
  }
  
  public function doList($page, $limit, $offset) {
    echo 'doList'; exit();
  }
}
?>