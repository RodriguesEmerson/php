<?php 
    require __DIR__ . '/inc/db-connect.inc.php';
    require __DIR__ . '/inc/functions.inc.php';

    $perPage = (int) 2;
    $page = (int) $_GET['page'] ?? 1;
    $offset = ($page - 1) * $perPage;

    $stsmCount = $pdo->prepare('SELECT COUNT(*) AS `count` FROM `entries`');
    $stsmCount->execute();
    $count = $stsmCount->fetchAll(PDO::ATTR_CASE);


    $stsm = $pdo->prepare('SELECT * FROM `entries` ORDER BY `date` DESC, `id` DESC LIMIT :perPage OFFSET :offset');
    $stsm->bindValue('perPage', (int) $perPage, PDO::PARAM_INT); #PDO::PARAM_INT ensuers the number be a integer.
    $stsm->bindValue('offset', (int) $offset, PDO::PARAM_INT); #PDO::PARAM_INT ensuers the number be a integer.
    $stsm->execute();
    $results = $stsm->fetchAll(PDO::FETCH_ASSOC);

    include __DIR__ . '/inc/header.php'
?>
    <main class="main">
        <div class="container">
            <h1 class="main-heading">Entries</h1>
            <?php foreach($results AS $card): ?>
                <div class="card">
                    <div class="card__image-container">
                        <img class="card__image" src="images/pexels-canva-studio-3153199.jpg" alt="" />
                    </div>
                    <div class="card__desc-container">
                        <div class="card__desc-time"><?php echo e(date('d M Y', strtotime($card['date']))) ?></div>
                        <h2 class="card__heading"><?php echo  e($card['title']) ?></h2>
                        <p class="card__paragraph"><?php echo e($card['message']) ?> </p>
                    </div>
                </div>
            <?php endforeach; ?>
          
            <ul class="pagination">
                <li class="pagination__li">
                    <a class="pagination__link" href="#">⏴</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link pagination__link--active" href="#">1</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link" href="#">2</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link" href="#">3</a>
                </li>
                <li class="pagination__li">
                    <a class="pagination__link" href="#">⏵</a>
                </li>
            </ul>
        </div>
    </main>
<?php include __DIR__ . '/inc/footer.php'?>