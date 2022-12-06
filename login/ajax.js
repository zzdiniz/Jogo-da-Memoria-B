let xhttp;
function enviarDados(){
    let username=document.getElementById("user").value;
    let pwd=document.getElementById("password").value;

    xhttp=new XMLHttpRequest();
    if(!xhttp){
        alert("Não foi possível criar  objeto XMLHttpRequest");
    }
    xhttp.onreadystatechange = result;
    xhttp.open('POST','db.php');
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send("username="+username+"&pwd="+pwd);

    function result() {
        try {
            if (xhttp.readyState === XMLHttpRequest.DONE) {
                if (xhttp.status === 200) {
                    let res = JSON.parse(xhttp.responseText);
                    console.log(res);
                    redirect(res);//se for um usuario valido vai para tela de jogo
                    //checkInfos(result, username, pwd);
                }
                else {
                    alert('Ocorreu um erro.');
                }
            }
        } 
        catch (e) {
            alert("Ocorreu uma exceção: " + e.description);
        }
    }
}

function checkInfos(res, username, pwd) {
    if (res.username == username && res.pwd == pwd) {
        console.log("Deu Bom!");
    } else {
        console.log("Informacoes erradas!")
    }
}
function redirect(result){
    if(result!=false){
        console.log("Login bem sucedido!");
        window.location.href="../jogo/jogo.php";
    }
    else if(result==false){
        alert("Usuario/Senha invalidos!");
    }
}