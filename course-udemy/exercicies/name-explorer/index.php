<?php
   require __DIR__ . '/inc/all.inc.php';
   $topNames = fetch_top_used_names();

   render('index.view', [
      'topNames' => $topNames
   ]);
