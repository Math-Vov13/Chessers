import mysql.connector # pip install mysql-connector-python

# Paramètres de connexion
config = {
    'user': 'root',
    'password': 'root',
    'host': 'localhost',
    'database': 'chessers db'
}

"""# Connexion à la base de données
conn = mysql.connector.connect(**config)

# Exécution d'une requête
cursor = conn.cursor()
query = "SELECT * FROM articles"
cursor.execute(query)

# Traitement des résultats
for row in cursor:
    print(row)

# Fermeture de la connexion
conn.close()"""

# Fonction pour récupérer une donnée dans la BDD
def getData(Table : str, Attribut : str, Value : str):
    # Connexion à la base de données
    conn = mysql.connector.connect(**config)
    cursor = conn.cursor()

    # Exécution de la requête
    Requete = f"SELECT * FROM {Table} WHERE {Attribut} = '{Value}'"
    print(Requete)
    cursor.execute(Requete)

    # Récupération de la valeur
    DataList = cursor.fetchone()

    # Fermeture de la connexion
    conn.close()

    return DataList

def SaveData(Table : str, Attribut : str, Id : int):
    # Connexion à la base de données
    conn = mysql.connector.connect(**config)
    cursor = conn.cursor()
    
    Requete = ""
    Requete = f"UPDATE {Table} SET {Attribut} = {Attribut} + 1 WHERE Id = {Id}"
    print(Requete)
    cursor.execute(Requete)

    # Fermeture de la connexion
    conn.close()

    return True


def Login(UserName : str, MDP : str):
    Data = getData("comptes", "Pseudonyme", UserName)
    print(Data)
    if not Data:
        return False, "No Account found !", "" #Réussi ?, Message Erreur, Identifiant du Compte
    
    if Data[3] == MDP:
        return True, "", Data[0]
    else:
        return False, "MDP Incorrect !", ""

def SaveGameData(ID : int, Victoire : bool):
    Requete = SaveData("classement", "Parties", ID)
    if Requete == False:
        return False, "Erreur durant la Sauvegarde des Données"
    
    if Victoire == True:
        Requete = SaveData("classement", "Victoires", ID)
        
        if Requete == False:
            return False, "Erreur durant la Sauvegarde des Données"

    return True, "Données Sauvegardées !"

#print(Login("MathV", "MathChess91"))
#print(SaveGameData(1234567890, True))