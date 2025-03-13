<ul>
   <?php foreach ($names as $name): ?>
      <li>
         <a href="name.php?<?php echo http_build_query(['name' => $name]) ?>">
            <?php echo e($name) ?>
         </a>
      </li>
   <?php endforeach; ?>
</ul>
<?php if($pagination['numberOfPages'] > 1):?>
   <ul style="list-style-type: none; display: flex; flex-direction: row; gap: 5px">
      <?php for($page = 1; $page <= $pagination['numberOfPages']; $page++):?>
         <li>
            <a 
               href="char.php?<?php echo http_build_query(['char' => $char, 'page' => $page])?>"
               class = "button"
               <?php if($page === $pagination['page']): ?>style="background-color: blue;" <?php endif;?>
            >
               <?php echo e($page)?>
            </a>
         </li>
      <?php endfor;?>
   </ul>
<?php endif;?>