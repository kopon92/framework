<?php

  ?>
<body>        
    <header>
          <div class="header-tit">
            <div id="wrapper">
            <a href="<?= APP_W; ?>"><img class="logo" alt="Put your logo" src="<?= APP_W.'pub/theme/k/'.$logo;?>"/></a>
            <h1><?= $titol;?></h1>
            </div>
          </div> <!-- from div header-tit -->
          <!-- user register div -->  
             
  </header>
  <section>
    <h2>Eliminar</h2>
    <br>

    
    <form method="POST" action="<?= APP_W; ?>eliminar/eliminar">
      <table>
        <tr>
          <td>Nombre de usuario a borrar</td>
          <td><input type="text" name="usuario"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="text" name="pas"></td>
        </tr>
      </table>
      <?php $mensaje =""; echo $mensaje; ?>
      <input type="submit" value="Enviar">
    </form>
  </section>