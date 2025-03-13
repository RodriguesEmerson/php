<?php 
    require __DIR__ . '/inc/functions.inc.php';
    
    #Check if a resquest was made.
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        seveNewEntrie();
    }
    
    function seveNewEntrie(){
        $title = (string) $_POST['title'] ?? '';
        $date = (string) $_POST['date'] ?? '';
        $message = (string) $_POST['message'] ?? '';
        $imgNameWithExtention = null;
        
        if(empty($title) || empty($date) || empty($message)){
            echo "<script>
            alert('All data are required');
            window.location.href = 'form.php';
            </script>";
        };

        if(!empty($_FILES) && !empty($_FILES['image'])){
            if($_FILES['image']['error'] === 0 && $_FILES['image']['size'] !== 0){
               $name = preg_replace('/[^a-zA-Z0-9]/', '', pathinfo($_FILES['image']['name'], PATHINFO_FILENAME));
               $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

   
               $originalImage = $_FILES['image']['tmp_name'];
               $imgNameWithExtention =  $name . '-'. time() . '.' .$extension;
               $imgDestination = __DIR__ . '/images/' . $imgNameWithExtention;
   
               #Resizing the image
               $imgSize = getimagesize($originalImage);

                if(!empty($imgSize)){
                    [$imgWidht, $imgHeight] = $imgSize;
        
                    $maxDim = 500; //The max dimention
                    $scaleFactor = $maxDim / max($imgWidht, $imgHeight);
                    $newImgWith = $scaleFactor * $imgWidht;
                    $newImgHeight = $scaleFactor * $imgHeight;
        
                    //If this function don't work, probabily the "extension=gd" is disabled in php.ini.
                    $jpegImg = imagecreatefromjpeg($originalImage); //Converting the image to .jpeg

                    if(!empty($jpegImg)){
                        $newImage = imagecreatetruecolor($newImgWith, $newImgHeight); //Create a white image that suports true colors.
                        //Really resize the image, preserving the the proporsions and improving the image quality.
                        imagecopyresampled($newImage, $jpegImg, 0, 0, 0, 0, $newImgWith, $newImgHeight, $imgWidht, $imgHeight);
            
                        //Save the new image into the destination path.
                        imagejpeg($newImage, $imgDestination);
                    }
                }
            };
        }

        try{
            require __DIR__ . '/inc/db-connect.inc.php';
    
            $stsm = $pdo->prepare('INSERT INTO `entries` 
                (`title`, `message`,`date`, `image`) 
                VALUES (:title, :message, :date, :image)
            ');
            $stsm->bindValue(':title',  $title);
            $stsm->bindValue(':message', $message);
            $stsm->bindValue(':date', $date);
            $stsm->bindValue(':image', $imgNameWithExtention);
    
            $stsm->execute();
        }catch(PDOException $error){
            echo "<script>
            alert('An error occurred. It was not possible to add the new card.');
            window.location.href = 'form.php';
            </script>";
        }
    }    


    include __DIR__ . '/inc/header.php';
?>
    <main class="main">
        <div class="container">
            <h1 class="main-heading">New Entry</h1>

            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="from-group__label" for="title">Title:</label>
                    <input class="from-group__input" type="text" id="title" name="title" require/>
                </div>
                <div class="form-group">
                    <label class="from-group__label" for="date">Date:</label>
                    <input class="from-group__input" type="date" id="date" name="date" require/>
                </div>
                <div class="form-group">
                    <label class="from-group__label" for="image">Image:</label>
                    <input class="from-group__input" type="file" id="image" name="image"/>
                </div>
                <div class="form-group">
                    <label class="from-group__label" for="message">Message:</label>
                    <textarea class="from-group__input" id="message" name="message" rows="6" require></textarea>
                </div>
                <div class="form-submit">
                    <button class="button">
                        <svg class="button__icon" viewBox="0 0 34.7163912799 33.4350009649">
                            <g style="fill: none; stroke: currentColor; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2px;">
                                <polygon points="20.6844359446 32.4350009649 33.7163912799 1 1 10.3610302393 15.1899978903 17.5208901631 20.6844359446 32.4350009649"/>
                                <line x1="33.7163912799" y1="1" x2="15.1899978903" y2="17.5208901631"/>
                            </g>
                        </svg>
                        Save!
                    </button>
                </div>
            </form>
        </div>
    </main>
<?php include __DIR__ . '/inc/footer.php'?>