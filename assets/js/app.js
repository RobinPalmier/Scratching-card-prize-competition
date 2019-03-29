let cards = document.querySelectorAll('scratch-card');
let tour = 0;

for(let i = 0; i < cards.length; i++){
    cards[i].addEventListener('scratch-finished',checkFinished, true);
}

// Fonction qui permet de détruire la session lorsque les cartes ont été gratté avec l'AJAX.
function ajaxDestroySession(){
    let req = new XMLHttpRequest();
    req.open('GET','assets/js/php-ajax/session_destroy.php', true);
    req.send();
    // On recharge le DOM pour être redirigé sur la page d'accueil une fois la session détruite.
    document.location.reload(true);
}

// Fonction permettant d'enregistrer le gagnant en base de données.
function ajaxSaveWinner(){
    let req = new XMLHttpRequest();
    req.open('GET','assets/js/php-ajax/insert_bdd.php', true);
    req.send();
}

// Fonction lorsque les cartes ont été gratté.
function checkFinished(){
    let compteur = tour++;
    let resultat = [];

    // On récupère la valeur de chaque carte grattée et on les stocks dans un array.
    for(let e = 0; e < tour; e++){
        let check = cards[e].attributes[2].nodeValue;
        resultat.push(check);
    }

    // Si les 3 cartes ont été grattées.
    if(compteur === 2){

        // S'il y a une carte gagnante dans l'array alors.
        if(resultat.indexOf("win") !== -1){

            // On récupère la valeur de chaque carte grattée.
            for(let e = 0; e < tour; e++){
                let valueName = cards[e].attributes[3].nodeValue;

                // On récupère le texte associé à la carte gagnante.
                if(valueName !== '80'){
                    let titleRes = "Félicitations, vous avez gagné !";
                    createResponseHTML(valueName, titleRes);
                    ajaxSaveWinner();
                    setTimeout(ajaxDestroySession, 5000);
                }
            }
        }
        else{
            // On définit les résultats en cas de défaite.
            let name = "Vous gagnerez peut-être une prochaine fois.";
            let titleRes = "Vous n'avez rien gagné...";
            createResponseHTML(name, titleRes);
            ajaxSaveWinner();
            setTimeout(ajaxDestroySession, 5000);
        }
    }
}

// Fonction permettant de créer les résultats en HTML.
function createResponseHTML(name, titleRes){
    // On sélectionne l'élément parent.
    let parent = document.getElementById("resultat-grattage");

    // Création du titre.
    let title = document.createElement("h4");
    if(titleRes.indexOf('rien') !== -1){
        title.setAttribute('class','loose-title');
    }
    let textTitle = document.createTextNode(titleRes);
    title.appendChild(textTitle);

    // Création du contenu.
    let content = document.createElement("p");
    let textContent = document.createTextNode(name);
    content.appendChild(textContent);

    let final = document.createElement("p");
    final.setAttribute('class','final-text');
    let finalContent = document.createTextNode("Veuillez patienter, vous allez être redirigés pour finaliser votre participation.");
    final.appendChild(finalContent);

    // On importe les éléments HTML dans le parent.
    parent.appendChild(title);
    parent.appendChild(content);
    parent.appendChild(final);
}