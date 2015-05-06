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
              <div class="regist">
                <label>Hola <?= $_SESSION['nom'];?>!</label>
           
              </div>
  </header>
  <section>
    <h2>Añadir User</h2>
    <br>

    
    <form method="POST" action="<?= APP_W; ?>panel/linia_nueva">
      <table>
        <tr>
          <td>Nombre:</td>
          <td><input type="text" name="nombre"></td>
        </tr>
        <tr>
          <td>Cognoms:</td>
          <td><input type="text" name="cognoms"></td>
        </tr>
        <tr>
          <td>Email:</td>
          <td><input type="text" name="email"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="password" name="password"></td>
        </tr>
      </table>
      <input type="hidden" name="create">
      <input type="submit" value="Enviar">
    </form>
  </section>