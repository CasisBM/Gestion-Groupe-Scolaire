<div id="container">
    <!-- zone de connexion -->
    
    <form action="index.php?page=login" method="POST">
        <h2>Se connecter</h2>
        
        <label>Identifiant</label>
        <input type="text" placeholder="Entrer l'identifiant" name="username" required>

        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>

        <input type="submit" id='submit' value='connexion' >
        
        <span class= 'psw'><a href="#">mot de passe oublier?</a></span>
    </form>
</div>
