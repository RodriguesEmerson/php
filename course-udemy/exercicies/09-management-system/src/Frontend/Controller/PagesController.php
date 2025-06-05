<?php


namespace App\Frontend\Controller;
use App\Frontend\Controller\AbstractController;
use App\Repository\PagesRepository;

class PagesController extends AbstractController{

   public function __construct(private PagesRepository $pagesRepository){}

   public function showPage($pageKey){
      $page = $this->pagesRepository->fetchBySlug($pageKey);

      if(!$page){
         return $this->error404();
      }

      $this->render('pages/showPages', [
         'page' => $page
      ]);
   }  
}
