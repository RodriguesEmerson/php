<?php
   declare(strict_types=1);
   
   function fetch_names_by_initial(string $char, int $page = 1,  int $perPage = 14): array{
      global $pdo;

      //Making sure that the page is never 0 or even negative.
      $page = max(1, $page);

      $stsm = $pdo->prepare('SELECT DISTINCT `name` FROM `names` WHERE `name` LIKE :expr ORDER BY `name` ASC LIMIT :limit OFFSET :offset');
      $stsm->bindValue(':expr', "$char%");
      $stsm->bindValue(':limit', $perPage, PDO::PARAM_INT);
      $stsm->bindValue(':offset', $perPage * ($page - 1), PDO::PARAM_INT);
      $stsm->execute();
      $names = [];
      $results = $stsm->fetchAll(PDO::FETCH_ASSOC);
      foreach ($results as $result) {
         $names[] = $result['name'];
      }

      return $names;
   };

   function count_names_by_initial(string $char): int{
      global $pdo;
      $stsm = $pdo->prepare('SELECT COUNT(DISTINCT `name`) AS `count` FROM `names` WHERE `name` LIKE :expr');
      $stsm->bindValue(':expr', "$char%");
      $stsm->execute();
      $result = $stsm->fetch(PDO::FETCH_ASSOC)['count'];
      return $result;
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
