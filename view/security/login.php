<!-- FORMULAIRE DE LOGIN -->

<div class="login-container">
    <h1>Se connecter</h1>
    <form action="http://localhost/FORUM/index.php?ctrl=security&action=login" method="POST">
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" name="submit" value="Se connecter">
    </form>
</div>