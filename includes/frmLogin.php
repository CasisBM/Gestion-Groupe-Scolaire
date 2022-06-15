<div id="container">
    <!-- zone de connexion -->
    
    <form action="index.php?page=login" method="POST">
        <h2>Se connecter</h2>
        
        <label>Identifiant</label>
        <input type="text" placeholder="Entrer l'identifiant" name="username">

        <label>Mot de passe</label>
        <input type="password" placeholder="Entrer le mot de passe" name="password" >

        <input type="submit" id='submit' value='Connexion' />
        <input type="hidden" name="frmLogin"/>
        
        <span class= 'psw'><a href="#">mot de passe oublier?</a></span>
    </form>
</div>
