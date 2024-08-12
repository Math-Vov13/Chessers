var Table

function CreateLigne(Id, Rang, Victoires, Parties) {
    Table = document.getElementById("TB")
    var SousTable = document.createElement("tr")


    //Rang -----------------------
    var rang = document.createElement("td")
    rang.appendChild(document.createTextNode(Rang))
    SousTable.appendChild(rang)

    //Id --------------------->
    var id = document.createElement("td")
    id.appendChild(document.createTextNode(Id))
    SousTable.appendChild(id)

    //Victoires ---------------
    var vict = document.createElement("td")
    vict.appendChild(document.createTextNode(Victoires))
    SousTable.appendChild(vict)

    //Parties ---------------
    var pt = document.createElement("td")
    pt.appendChild(document.createTextNode(Parties))
    SousTable.appendChild(pt)

    Table.appendChild(SousTable)
}