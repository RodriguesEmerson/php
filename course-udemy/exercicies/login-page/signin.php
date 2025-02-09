<?php 
   // $style="./style.css";
   include "./inc/header.inc.php"
?>
   <main>
      <section>
         <div class="div-form">
            <div class="form-box div-form-signin">
               <h1>SignIn</h1>
               <form action=" ?>" method="post">
                  <label for="id-email">E-mail</label>
                  <input type="email" placeholder="e-mail" id="id-email">
                  <label for="id-password">Password</label>
                  <input type="password" placeholder="password" id="id-password">
                  <button type="submit">SignIn</button>
               </form>
               <div class="remeber-me-div">
                  <input type="checkbox" name="remember-checkbox" id="id-remember-checkbox">
                  <label for="id-remember-checkbox">Remember me</label>
               </div>
               <div class="dont-have-an-account-div">
                  <span>Do you don't have an account?</span>
                  <a href="signup.php">SignUp</a>
               </div>
            </div>
            <div class="side-div side-div-signin">
   
            </div>
         </div>
      </section>
   </main>
<?php 
   include "./inc/footer.inc.php"
?>