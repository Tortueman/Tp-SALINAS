<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creer un compte</title>
</head>
<body>

    <h1>Creer un compte</h1>
    
    <main>
        <form action="index.php" method="get">
            <fieldset>
                <label for="">Nom de l'article : </label>
                <input type="text" name="nomArticle">

                <label for="">Auteur de l'article: </label>
                <input type="text" name="auteur">
                
                
                <label for="">Categorie : </label>
                <input type="text" name="categ">
                

                <label for="">Contenue : </label>
                <input type="text" name="contenue">
               
                <input type="hidden" name="page" value="addArticle">
                <input type="submit" value="Valider">
                
            </fieldset>
        </form>

    </main>
    
</body>
</html>