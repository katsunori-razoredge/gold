<?php
App::uses('AppModel', 'Model');
App::uses('RzModelInterface', 'Lib');
App::uses('BumpRepository', 'Lib/Repository');
App::uses('Tag', 'Model');

class BumpUseCase implements RzModelInterface {
	protected $dest;
//  protected $Som;
  protected $Tag;
  protected $somRepo;

  public function __construct($dest) {
    $this->dest = $dest;
//    $this->somRepository = new SomRepository($dest);
  }

  public function findById($id, $as='') {
    $repo = new BumpRepository($this->dest);
    return $repo->findById($id);
  }
  
  public function save($bo) {
    $repo = new BumpRepository($this->dest);
    return $repo->save($bo);
  }

  public function giveCount() {
  }

  public function fetchPage($page, $limit, $offset=0) {
    $repo = new BumpRepository($this->dest);
    return $repo->fetchPage($page, $limit, $offset);
  }
}

?>
