<?php 
   // $style="./style.css";
   include "./inc/header.inc.php"
?>
   <main>
      <section>
         <div class="div-form div-form-signup">
         <div class="side-div side-div-signup">
         </div>
            <div class="form-box ">
               <h1>SignUp</h1>
               <form action="<?=$_SERVER["PHP_SELF"] ?>" method="post">
                  <label for="id-name">Name</label>
                  <input type="text" placeholder="name" id="id-name">
                  <label for="id-email">E-mail</label>
                  <input type="email" placeholder="e-mail" id="id-email">
                  <label for="id-password">Password</label>
                  <input type="password" placeholder="password" id="id-password">
                  <button type="submit">SignUp</button>
               </form>
              
               <div class="dont-have-an-account-div">
                  <span>Do you already have an account?</span>
                  <a href="signin.php">SignIn</a>
               </div>
            </div>
            
         </div>
      </section>
   </main>
<?php 
   include "./inc/footer.inc.php"
?>