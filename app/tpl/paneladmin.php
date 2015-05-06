
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
    <h2>Panel de admin</h2>
<br>
   <a href="<?= APP_W; ?>registro" >Añadir User</a>
    <br>
   <a href="<?= APP_W; ?>modificar" >Modificar User</a>
   <br>
   <a href="<?= APP_W; ?>eliminar" >Eliminar User</a>
  </section>