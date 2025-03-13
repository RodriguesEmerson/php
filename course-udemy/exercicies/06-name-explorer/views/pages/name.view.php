<h1>Statitics for the name: <?php echo e($name) ?></h1>
<?php if (!empty($nameEntries)): ?>
   <table>
      <thead>
         <tr>
            <th>Year</th>
            <th>Number of Babies born</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($nameEntries as $entry): ?>
            <tr>
               <td><?php echo e($entry['year']) ?></td>
               <td><?php echo e($entry['count']) ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
<?php else: ?>
   <p>We could not find any entries in our system :/ </p>
<?php endif; ?>