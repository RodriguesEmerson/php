<?php 
   header('Content-Type: image/jpeg');
   header('Content-Disposition: attachment; filename=image.jpg');
   header('Content-Lengtht: ' . filesize(__DIR__ . '/IMG2-1741154095.jpg'));

   readfile(__DIR__ . '/IMG2-1741154095.jpg');