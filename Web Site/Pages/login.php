<!DOCTYPE html>
<html>
<head>
	<title>Formulaire de connexion</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="container">
		<h1>Formulaire de connexion</h1>
		<form id="loginForm" onsubmit="return login()">
			<label for="username">Nom d'utilisateur :</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Se connecter">
		</form>
		<div id="message"></div>
	</div>
    <div class="container">
		<h1>Formulaire d'inscription</h1>
		<form id="loginForm" onsubmit="return login()">
			<label for="username">Nom d'utilisateur :</label>
			<input type="text" id="username" name="username" required>
            <label for="username">Email :</label>
			<input type="email" id="email" name="email" required>
			<label for="password">Mot de passe :</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="S'inscrire">
		</form>
		<div id="message"></div>
	</div>

	<script src="echecs.js"></script>
</body>
</html>