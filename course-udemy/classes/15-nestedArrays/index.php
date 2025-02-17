<?php 
   function e($value){
      return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
   }
?>
<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Nested Arrays</title>
   <style>
      *{
         font-family: Arial, Helvetica, sans-serif;
         box-sizing: border-box;
         margin: 0;
         padding: 0px;
      }
      h1{
         height: 50px;
         background-color: darkcyan;
         text-align: center;
         align-content: center;
         color: white;
         margin-bottom: 20px;
      }
      .courses-box{
         width: 70%;
         margin: auto;
         margin-bottom: 20px;
         display: flex;
         flex-direction: row;
         gap: 20px;

         & ul{
            list-style-position: inside;
            background-color: lightgray;
            border: 1px solid gray;
            border-radius: 7px;
            padding: 10px;
         }
      }
      .details-box{
         align-items: start;
         margin-top: 20px;

         & details{
            width: 100%;
            background-color: lightgray;
            border: 1px solid gray;
            border-radius: 7px;
            padding: 10px;

            & summary{  
               cursor: pointer;
               margin-bottom: 10px;
            }
         }
      }
   </style>
</head>
<body>
   <h1>Nested Arrays</h1>
   <?php 
      $courses = [
         [
            "title" => "English Beginners",
            "desc" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi asperiores molestiae cumque",
            "flag" => "flag"
         ],
         [
            "title" => "Spanish Beginners",
            "desc" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi asperiores molestiae cumque",
            "flag" => "flag"
         ],
         [
            "title" => "Janapese Beginners",
            
            "flag" => "flag"
         ]
      ]
   ?>
   <section class="courses-box">
      <?php foreach($courses AS $course) :?>
         <ul>
            <?php foreach($course AS $index => $value) :?>
               <li><?php echo e($value)?></li>
            <?php endforeach;?>
         </ul>
      <?php endforeach;?>
   </section>
   <section class="courses-box details-box">
   <?php foreach($courses AS $course) :?>
         <details>

            <summary><?php echo e($course["title"])?></summary>
            <?php if(isset($course["desc"]) && !empty($course["desc"])):?>
               <p><?php echo e($course["desc"])?></p>
            <?php endif;?>
         </details>
      <?php endforeach;?>
   </section>
  
</body>
</html>