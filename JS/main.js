function goCreateWindow(){
    window.location.href = "create.php";
}

function validateSelections(url) {
    const form = document.getElementById("edit-form");

    const inputs = document.getElementsByName("user-ids[]");
    
    let min = false;

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].checked) {
            min = true;
            break;
        }
    }
    
    if(min){
        form.action = url;
        form.submit();
    }else{
        alert("Seleccione un Usuario.");
    }    
}

function deleteSelections(url){

    const form = document.getElementById("edit-form");

    const inputs = document.getElementsByName("user-ids[]");
    
    let min = false;

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].checked) {
            min = true;
            break;
        }
    }
    
    if(min){
        form.action = url;
        form.submit();
    }else{
        alert("Seleccione un Usuario.");
    }    
}


function showUser(url){

    const searchText = document.getElementById("search-text");

    if(searchText.value != ""){
        
        const form = document.getElementById("search-form");

        form.action = url;
        form.submit();

    }

}

function goHome(){
    window.location.href = "users.php";
}

