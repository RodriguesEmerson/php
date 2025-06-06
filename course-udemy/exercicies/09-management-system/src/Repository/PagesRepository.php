<?php

namespace App\Repository;

use App\Model\PageModel;

class PagesRepository{

   public function __construct(private \PDO $pdo){}

   public function fetchForNavigation(): ?array {
      $stmt = $this->pdo->prepare(
         'SELECT * FROM `pages` ORDER BY `id` ASC'
      );
      $stmt->execute();
      return $stmt->fetchAll(\PDO::FETCH_CLASS, PageModel::class) ?: null;
   }

   public function fetchBySlug(string $slug): ?PageModel{
      $stmt = $this->pdo->prepare(
         'SELECT * FROM `pages` WHERE `slug` = :slug'
      );
      $stmt->bindValue(':slug', $slug);
      $stmt->execute();
      $stmt->setFetchMode(\PDO::FETCH_CLASS, PageModel::class);
      return $stmt->fetch() ?: null;

      //For some reason, when I fetch all, it doesn't need to setFetchMode.
         // $result = $stmt->fetchAll(\PDO::FETCH_CLASS, PageModel::class);

   }
}