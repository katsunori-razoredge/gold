<?php
App::uses('CapsuleRepository', 'Lib/Repository/Capsule');
App::uses('UseCaseInterface', 'Lib/UseCase');
class DoListUseCase {
  protected $dest = '';
  public function __construct($dest) {
    $this->dest = $dest;
  }
  
  public function execute($page, $limit) {
    $repo = new CapsuleRepository($this->dest);
    return $repo->fetchPage($page, $limit, -1);
  }
}
?>
