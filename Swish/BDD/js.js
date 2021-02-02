function sdf(){
	window.alert("lksjdf");
}


function creerPartie(){
	localStorage.setItem("nomJoueur", "J1");
}

function affichage(){
	document.getElementById("instructions").innerHTML = localStorage.getItem("nomJoueur");
	if( localStorage.getItem("nomJoueur") == 'J1'){
		document.getElementById("messages").innerHTML = "Tu joues les croix"
	}
	else{
		document.getElementById("messages").innerHTML = "Tu joues les ronds"
		window.alert(localStorage.getItem("nomJoueur"));
	}
}


function ValidateEmail(entre) 
{
 if (entre!="X" ||(entre !="x"))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}

/*
function rejoindrepartie(){
	localStorage.setItem("nomJoueur", "J2");
}

function Tourdequi(joueur){
	if(tab j1 + tabj2 .lenght %2==0){
		return J1;
	}

	return J2;
}

function finirpartie(){
	localStorage.removeItem("nomJoueur");
}

localStorage.setItem("lastname", "Smith");
// Retrieve
document.getElementById("result").innerHTML = localStorage.getItem("lastname"); */