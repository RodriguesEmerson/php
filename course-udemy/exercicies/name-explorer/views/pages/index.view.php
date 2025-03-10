<h1>Most common names:</h1>
<ol>
   <?php foreach($topNames AS $name):?>
      <li>
         <a href="name.php?<?php echo http_build_query(['name' => $name['name']]); ?>">
            <?php echo e($name['name'])?>
         </a>
      </li>
   <?php endforeach;?>
</ol>