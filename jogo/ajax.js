let xhttp;

function conexaoPHP(disconnect) {
    xhttp = new XMLHttpRequest()

    
    xhttp.onreadystatechange = enviarDados;
    xhttp.open('POST', 'db.php');
    xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    let time = new Date((modoDeJogo === -1 ? (initialTime - countContraTempo) : countClassico) * 1000).toISOString().slice(11, 19);

    xhttp.send(`username=${username}&score=${attempts}&size=${boardSize}&mode=${modoDeJogo}&time=${time}&res=${win}&disconnect=${disconnect}`);
    
    if(!xhttp) {
        window.alert("Não foi possível criar objeto XMLHttpRequest");
    }
    if (disconnect==1) {
        window.location.href = "../login/telaLogin.php";
    }
}

function enviarDados() {
    try {
        if (xhttp.readyState === XMLHttpRequest.DONE) {
            if (xhttp.status === 200) {
                let result = JSON.parse(xhttp.responseText);
                console.log(result);
            } else {
                window.alert("Ocorreu um erro com a conexão");
            }
        }
    }
    catch (e) {
        alert(`Ocorreu uma exceção: ${e.description}`);
    }
};