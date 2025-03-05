<?php 
    require __DIR__ . '/inc/db-connect.inc.php';
    require __DIR__ . '/inc/functions.inc.php';

    $perPage = (int) 3;
    $page = $_GET['page'] ?? 1;
    $offset = ($page - 1) * $perPage;

    #Count number of entries in the DataBase.
    $stsmCount = $pdo->prepare('SELECT COUNT(*) AS `count` FROM `entries`');
    $stsmCount->execute();
    $count = $stsmCount->fetch(PDO::FETCH_ASSOC)['count'];
    $nunPages = ceil($count / $perPage);

    #Fetch the datas from DataBase.
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
                    <?php if($card['image'] !== NULL):?>
                        <div class="card__image-container">
                            <img class="card__image" src="./images/<?php echo rawurlencode($card['image'])?>" alt="" />
                        </div>
                    <?php endif;?>
                    <div class="card__desc-container">
                        <div class="card__desc-time"><?php echo e(date('d M Y', strtotime($card['date']))) ?></div>
                        <h2 class="card__heading"><?php echo  e($card['title']) ?></h2>
                        <p class="card__paragraph"><?php echo e($card['message']) ?> </p>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if($nunPages > 1):?>
                <ul class="pagination">
                    <?php if($page > 1):?>
                        <li class="pagination__li">
                            <a class="pagination__link" href="index.php?<?php echo http_build_query(['page' => $page == 1 ? 1 : $page - 1]) ?>">⏴</a>
                        </li>
                    <?php endif;?>

                    <?php for($ind = 1; $ind <= $nunPages; $ind++):?>
                        <li class="pagination__li">
                            <a 
                                class="pagination__link <?php echo $page == $ind ? 'pagination__link--active' : ''?>" 
                                href="index.php?<?php echo http_build_query(['page' => $ind])?>"
                            >
                                <?php echo e($ind)?>
                            </a>
                        </li>
                    <?php endfor;?>
                    
                    <?php if($page < $nunPages):?>
                    <li class="pagination__li">
                        <a class="pagination__link" href="index.php?<?php echo http_build_query(['page' => $page + 1]) ?>">⏵</a>
                    </li>
                    <?php endif;?>
                </ul>
            <?php endif;?>
        </div>
    </main>
<?php include __DIR__ . '/inc/footer.php'?>