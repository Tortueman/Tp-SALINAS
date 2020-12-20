<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>

    <!-- header -->
    <?php include('../src/BlogBundle/Resources/views/header.php'); ?>

    <form action="index.php" method="get">
    <input type="hidden" name="page" value="ajouter">        
    <input type="submit" value="Ajouter un article ">
    </form>

    <form action="index.php" method="get">
    <input type="hidden" name="page" value="modifier">        
    <input type="submit" value="Modifier un article">
    </form>

    <form action="index.php" method="get">
    <input type="hidden" name="page" value="supprimer">        
    <input type="submit" value="Supprimer un article ">
    </form>

</body>
</html>