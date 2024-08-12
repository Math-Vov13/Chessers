<!DOCTYPE html>
<html>
<head>
	<title>Leaderstats</title>
    <link rel="stylesheet" type="text/css" href="classement.css" />
    <script src="classement.js"></script>
</head>
<body>
	<h1>Classement d'échecs</h1>

	<input type="text" id="recherche" placeholder="Rechercher par le nom des joueurs">

	<table id="table">
		<thead>
            <tr>
            <th>Rang</th>
            <th>Id du joueur</th>
            <th>Victoires</th>
            <th>Parties Jouées</th>
            </tr>
        </thead>
        <tbody id = "TB">

		</tbody>
	</table>

    <?php
            //https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/selectionner-donnee-table/
            include '../PhpConnect.php';
            $Cat = "Technologie"; //Nom de la Catégorie
            global $db;
            global $Data;


            $q = $db->prepare("SELECT * FROM classement");
            $q->execute();
            $resultat = $q->fetchAll(PDO::FETCH_ASSOC);
                    
            /*print_r permet un affichage lisible des résultats,
            *<pre> rend le tout un peu plus lisible*/
            echo '<pre>';
            print_r($resultat);
            echo '</pre>';
        ?>

	<script>
        var Donnees = <?php echo json_encode($resultat); ?>;
        console.log(Donnees)

        if (Donnees.length > 0) {
            for(i = 0; i < Donnees.length; ++i) {
                //alert(i)
                Data = Donnees[i]
                CreateLigne(Data["Id"],
                    Data["Rang"],
                    Data["Victoires"],
                    Data["Parties"])
            }
        } else {
            alert("Le Tableau a mal été chargé !")
        }

		// Filtrer les résultats en fonction du texte entré dans l'input
		const filterInput = document.getElementById('recherche');
		filterInput.addEventListener('input', () => {
			const filterText = filterInput.value.toLowerCase();
			const tableRows = document.querySelectorAll('#table tbody tr');
			tableRows.forEach(row => {
				const playerName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
				if (playerName.includes(filterText)) {
					row.style.display = '';
				} else {
					row.style.display = 'none';
				}
			});
		});
	</script>
    <footer>
		<p>© 2023 Le jeu d'échecs</p>
	</footer>
</body>
</html>