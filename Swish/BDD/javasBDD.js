
const sqlite3 = require('sqlite3').verbose();
const nomBDD = "morpion.db"
let db = new sqlite3.Database(nomBDD, sqlite3.OPEN_READWRITE, (err) => {
    if (err) {
        return console.error(err.message);
    }
    console.log('Connexion reussi a :', nomBDD);
});



function GenereChaine(){
  var texte = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  for (var i = 0; i < 8; i++)
    texte += possible.charAt(Math.floor(Math.random() * possible.length));

  return texte;
}

function Insertion(table, colonne, valeur, colonne2, valeur2) {
    db.run("UPDATE '" + table + "' SET " + colonne + " = " + valeur + " WHERE " + colonne2 + " = '" + valeur2 + "'")
    console.log("Insertion de " + valeur + " reussi")
}

function RecuperValeur(table, colonne, colonne2, valeur) {
    var retour;
    db.all("SELECT " +colonne+ " FROM " +table+ " WHERE " +colonne2+ "='" +valeur+"'", (err, data) => {
        //console.log(data);
        retour=data;
        return retour;
    });

}
var res = db.run("SELECT * FROM partie");
console.log(res);


function InitialserBDD(){
    db.run('INSERT INTO PARTIE(id) VALUES(?)', [GenereChaine()]);
}

function SupprimerLigne(id){
    db.run("DELETE FROM PARTIE where id='"+id+"'");
}

InitialserBDD();
//Insertion("PARTIE","ptsj1","1","id","96FVGDWY");
var dfs= RecuperValeur("PARTIE","ptsJ1","id","UFS6ySfL");
console.log(dfs);



/*
let sql = `SELECT * FROM PARTIE`;
db.all(sql, [], (err, rows) => {
  if (err) {
    throw err;
  }
  rows.forEach((row) => {
    console.log(row.name);
  });
});
*/

//ouverture de la base de donn�
/*
function test() {
  var fullname;
  var fname = "ptsj2";
  let sql = 'SELECT * FROM PARTIE';
  db.each(sql, [fname], (err, row) => {
    if (err) {
      throw err;
    }
    fullname = ('${row.Name}');
    alert(fullname);;
  });
  db.close();
}

test();

*/
/*
Insertion("PARTIE", "ptsJ1", 4, "id", "UFS6ySfL");
Insertion("PARTIE", "ptsJ2", 100, "id", "UFS6ySfL");

Insertion("PARTIE", "ptsJ2", 10, "id", "96FVGDWY");

*/

//db.run('CREATE TABLE PARTIE(id varchar(8),ptsJ1 int,ptsj2 int)');


//db.run('INSERT INTO score(id) VALUES(?)', ["J1"])
//db.run('INSERT INTO score(id) VALUES(?)', ["J2"])

//UPDATE SCORE SET 'Two' = 2  WHERE ID = 'J1'

db.all("SELECT * FROM PARTIE", (err, rows) => {
    var res="";
    if (err) {
        throw err
    }
    console.log("Affichage de la table partie\n")
    rows.forEach((row)=>{
        res=res+row.name;
        console.log(res);

    });

    
   
});



// fermeture de la base de donn�
db.close((err) => {
    if (err) {
        return console.error(err.message);
    }
    console.log('Fermeture de la base de donnes :',nomBDD);
});


