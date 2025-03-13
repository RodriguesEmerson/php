<?php
   require __DIR__ . '/inc/all.inc.php';

   $char = $_GET['char'] ?? 'A';
   $char = (string) $char;
   if (strlen($char) > 1) {
      $char = $char[0];
   }

   //It ensures that the $char always be a letter between A and Z;
   $regexAllowedCharacter = "/[A-Z]/";
   if(!preg_match($regexAllowedCharacter, $char)){
      $char = 'A';
   };

   $char = strtoupper($char);
   $page = (int)($_GET['page'] ?? 1);
   $perPage = 13;

   $names = fetch_names_by_initial($char, $page, $perPage);
   $count = count_names_by_initial($char);

   $numberOfPages = (int)(ceil($count / $perPage));

   render('char.view', [
      'char' => $char,
      'names' => $names,
      'pagination' => [
         'page' => $page,
         'numberOfPages' => $numberOfPages
      ]
   ]);