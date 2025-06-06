<?php

class PostRepository{
   public function  __construct(){}
}

class PostController{
   public function __construct(private PostRepository $postRepository){}
}
/*
class Container{
   //Oldd way
   private PostRepository $postRepository;
   private PostController $postController;

   private array $intances = []; //This is better

   public function getPostRepository(): PostRepository{
      if(empty($this->instances['postRepository'])){
         $this->intances['postRepository'] = new PostRepository('A', 'B');
      }
      return $this->intances['postRepository'];
   }

   public function getPostController():PostController {
      if(empty($this->intances['postController'])){
         $postRepository = $this->getPostRepository();
         $this->intances['postController'] = new PostController($postRepository);
      }

      return $this->intances['postController'];
   }
}
*/

class Container{
   private array $instances = [];
   private array $recipes = [];

   public function __construct(){
      $this->recipes['postRepository'] = function(){
         return new PostRepository('A', 'B');
      };
      $this->recipes['postController'] = function(){
         $postRepository = $this->get('postRepository');
         return new PostController($postRepository);
      };
   }

   public function get($what){
      if(empty($this->instances[$what])){
         if(empty($this->recipes[$what])){
            echo "Could not build $what";
            die();
         }
         $this->instances[$what] = $this->recipes[$what]();
      };
      return $this->instances[$what];
   }

}

$container = new Container();
$postRepository = $container->get('postRepository');
var_dump($postRepository);
$postController = $container->get('postController');
var_dump($postController);