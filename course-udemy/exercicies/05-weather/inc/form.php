
<div class="form-box">
   <form class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
      <label for="idcity">Busque pelo nome da cidade</label>
      <div>
         <input type="text" value="<?php  echo isset($_GET['city']) ? sh($_GET['city'])  : ''?>" name="city" id="idcity" placeholder="Busque pelo nome da cidade">
         <input type="submit" value="Buscar" id="submitButton">
      </div>
   </form>
</div>