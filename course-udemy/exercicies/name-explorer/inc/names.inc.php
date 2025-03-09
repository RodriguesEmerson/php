<?php
   declare(strict_types=1);
   
   function fetch_names_by_initial(string $char): array{
      global $pdo;
      $stsm = $pdo->prepare('SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :expr ORDER BY `name` ASC');
      $stsm->bindValue(':expr', "$char%");
      $stsm->execute();
      $names = [];
      $results = $stsm->fetchAll(PDO::FETCH_ASSOC);
      foreach ($results as $result) {
         $names[] = $result['name'];
      }

      return $names;
   }

   function fetch_name_entries(string $name): array{
      global $pdo;
      $stsm = $pdo->prepare('SELECT `year`,`count` FROM `names` WHERE `name` = :name ORDER BY `year` ASC');
      $stsm->bindValue(':name', $name);
      $stsm->execute();
      $results = $stsm->fetchAll(PDO::FETCH_ASSOC);
      
      $nameEntries = [];
      foreach($results AS $result){
         $nameEntries[] = [
           'year' => $result['year'],
           'count' => $result['count'],
         ];
      }

      return $nameEntries;

   }

   function fetch_top_used_names(): array{
      global $pdo;

      $stsm = $pdo->prepare('SELECT `name`, SUM(`count`) AS `sum` FROM `names` GROUP BY `name` ORDER BY `sum` DESC LIMIT 10');
      $stsm->execute();
      $results = $stsm->fetchAll(PDO::FETCH_ASSOC);
      
      return $results;
   }
