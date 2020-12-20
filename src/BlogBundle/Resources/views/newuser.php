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
                <label for="">Nom : </label>
                <input type="text" name="nom">

                <label for="">Prenom : </label>
                <input type="text" name="prenom">
                
                
                <label for="">Pseudo : </label>
                <input type="text" name="pseud">
                

                <label for="">Mot de passe : </label>
                <input type="password" name="mdp">
               
                <input type="hidden" name="page" value="createUser">        
                <input type="submit" value="Valider">
                
            </fieldset>
        </form>

    </main>
    
</body>
</html>