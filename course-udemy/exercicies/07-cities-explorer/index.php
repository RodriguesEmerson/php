<?php 
   require __DIR__ . '/inc/all.inc.php';

   $wordDityRepository = new WordCityRepository($pdo);
   $data = $wordDityRepository->fetch();
   render('index.view', [
      'data' => $data,
   ]);