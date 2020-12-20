<header>

  <div>
  
    <?php
      echo '<span>'.$identity.'<span>';
    ?>
    <form action="index.php" method="get">
    <input type="hidden" name="deco" value="deco">        
    <input type="submit" value="Deconnexion">
    </form>
  </div>

    <nav class="enabled">
      <ul>
        <li>
          <form action="index.php" method="get">
          <input type="hidden" name="page" value="accueil">        
          <input type="submit" value="Accueil">
          </form>
        </li>
        <li>
          <form action="index.php" method="get">
            <input type="hidden" name="page" value="admin">        
            <input type="submit" value="Administration">
          </form>
        </li>

        <li>
          <form action="index.php" method="get">
            <input type="hidden" name="page" value="listing">        
            <input type="submit" value="Afficher les articles">
          </form>
        </li>
        
      </ul>
  </nav>

</header>