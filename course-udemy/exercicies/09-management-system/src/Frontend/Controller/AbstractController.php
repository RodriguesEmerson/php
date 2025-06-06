<?php

namespace App\Frontend\Controller;

use App\Repository\PagesRepository;

abstract class AbstractController{

   public function __construct(protected PagesRepository $pagesRepository){}

   protected function render($view, $params){
      extract($params);

      ob_start();
      require_once __DIR__ . '/../../../views/frontend/' . $view . '.view.php';
      $contents = ob_get_clean();

      $navigation = $this->pagesRepository->fetchForNavigation();

      require_once __DIR__ . '/../../../views/frontend/layouts/main.view.php';
   }

   protected function error404() {
       http_response_code(404);

       $this->render('notFound/error404', []);
   }
}