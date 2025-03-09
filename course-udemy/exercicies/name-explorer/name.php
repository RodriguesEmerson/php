<?php 
   require __DIR__ . '/inc/all.inc.php';

   $name = (string) $_GET['name'] ?? '';
   if(empty($name)){
      header('Location: index.php');
      die();
   }

   $nameEntries = fetch_name_entries($name);
?>

<?php require __DIR__ . '/views/header.php'?>
   <h1>Statitics for the name: <?php echo e($name)?></h1>
   <?php if(!empty($nameEntries)):?>
      <table>
         <thead>
            <tr>
               <th>Year</th>
               <th>Number of Babies born</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach($nameEntries AS $entry):?>
               <tr>
                  <td><?php echo e($entry['year'])?></td>
                  <td><?php echo e($entry['count'])?></td>
               </tr>
            <?php endforeach;?>
         </tbody>
      </table>
   <?php else:?>
      <p>We could not find any entries in our system :/  </p>
   <?php endif;?>

<?php require __DIR__ . '/views/footer.php'?>