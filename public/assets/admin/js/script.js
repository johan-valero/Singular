// Fonction pour changer le display du formulaire d'ajout de logements
function show(){
    var show = document.querySelector(".show");
    
    if(show.style.display === "none" || show.style.display === ""){
        show.style.display = "block";
        
    }else{
        show.style.display = "none";
    }
}

// Réinitialise les valeurs de inputs files
function resetFile() {
    var file1 = document.querySelector('#image');
    var file2 = document.querySelector('#image2');
    var file3 = document.querySelector('#image3');
    file1.value = '';
    file2.value = '';
    file3.value = '';
}