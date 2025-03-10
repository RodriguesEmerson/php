<?php
   require __DIR__ . '/inc/all.inc.php';

   $char = $_GET['char'] ?? 'A';
   $char = (string) $char;
   if (strlen($char) > 1) {
      $char = $char[0];
   }
   $char = strtoupper($char);
   $names = fetch_names_by_initial($char);

   render('char.view', [
      'char' => $char,
      'names' => $names
   ]);