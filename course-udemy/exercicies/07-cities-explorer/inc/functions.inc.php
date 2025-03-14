<?php 


   function render($view, $params){
      extract($params);
      ob_start();
         require __DIR__ . '/../view/pages/' . $view . '.php';
         $contents = ob_get_clean();
         require __DIR__ . '/../view/layouts/main.view.php';
   }

   function e($value){
      return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
   }
?>