<!-- FORMULAIRE DE REGISTER -->

<div class="login-container">
    <h1>S'inscrire</h1>
    <form action="http://localhost/FORUM/index.php?ctrl=security&action=register" method="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        
        <label for="pass1">Mot de passe</label>
        <input type="password" name="pass1" id="pass1" required>
        

        <label for="pass2">Confirmation du mot de passe</label>
        <input type="password" name="pass2" id="pass2" required>
        
        <input type="submit" name="submit" value="S'enregistrer">
    </form>
</div>