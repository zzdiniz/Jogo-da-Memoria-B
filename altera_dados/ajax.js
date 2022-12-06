let xhttp;

function enviarDados(){
    let name=document.getElementById("name").value;
    let phone=document.getElementById("phone").value;
    let email=document.getElementById("email").value;
    let pwd=document.getElementById("senha").value;

    xhttp=new XMLHttpRequest();
    if(!xhttp){
        alert("Não foi possível criar  objeto XMLHttpRequest");
    }
    xhttp.onreadystatechange = result;
    xhttp.open('POST','db.php');
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    name=encodeURIComponent(name);
    xhttp.send("name="+name+"&phone="+phone+"&email="+email+"&pwd="+pwd);
}

function result() {
    try {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                let result = JSON.parse(xhttp.responseText);
                console.log(result);
                alert("Cadastro bem sucedido!");
                //redirect(result);
            }
            else {
                alert('Um problema ocorreu.');
            }
        }
    } 
    catch (e) {
        alert("Ocorreu uma exceção: " + e.description);
    }
}

function redirect(result){
    if(result!=false){
        console.log("Login bem sucedido!");
        window.location.href="../login/telaLogin.php";
    }
    else if(result==false){
        alert("Usuario/Senha invalidos!");
    }
}