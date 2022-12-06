
let xhttp;
function enviarDados(){
    xhttp=new XMLHttpRequest();
    if(!xhttp){
        alert("Não foi possível criar  objeto XMLHttpRequest");
    }
    xhttp.onreadystatechange = result;
    xhttp.open('POST','close_connection.php');
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhttp.send();

    function result() {
        try {
            if (xhttp.readyState === XMLHttpRequest.DONE) {
                if (xhttp.status === 200) {
                    window.alert("Usuário desconectado com sucesso");
                    window.location.href="../login/telaLogin.php";
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