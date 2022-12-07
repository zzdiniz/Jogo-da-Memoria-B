let cards2 = [
    "diamante",
    "chama"
]

let cards4 = [
    "aquatico",
    "besta",
    "chama",
    "quatroBracos",
    "diamante",
    "fantasmatico",
    "ultraT",
    "xlr8"
]

let cards6 = [
    "aquatico",
    "besta",
    "chama",
    "quatroBracos",
    "diamante",
    "fantasmatico",
    "ultraT",
    "xlr8",
    "balaDeCanhao",
    "benMumia",
    "cipoSelvagem",
    "cuspidor",
    "enormossauro",
    "glutao",
    "insectoide",
    "massaCinzenta",
    "lobisben",
    "vilgax"
]

let cards8 = [
    "aquatico", 
    "azmuth",
    "balaDeCanhao",
    "ben1000",
    "benMumia",
    "besta",
    "chama",
    "cipoSelvagem",
    "clone",
    "cuspidor",
    "diamante",
    "drAnimal",
    "enormossauro",
    "fantasmatico",
    "gigante",
    "glutao",
    "Gwen",
    "hex",
    "insectoide",
    "kevin",
    "kevinMonstro",
    "liveAction",
    "lobisben",
    "massaCinzenta",
    "omnitrix",
    "paiBen10",
    "quatroBracos",
    "ultraT",
    "vanVovoMax",
    "vilgax",
    "vovoMax",
    "xlr8"
]

// Variavel da seçaõ do jogo
let section = window.document.getElementById("game");
let boxes = [];
let boardSize;
let modoDeJogo;
let initialTime;

// Embaralha o array de cartas
function shuffleArray(cards) {//embaralha o array
    for (let i = cards.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        // Reposicionando elemento
        [cards[i], cards[j]] = [cards[j], cards[i]];
    }
    console.log(cards)
    return cards;
}

// Array com todas as opções duplicadas
let allCards = [];
// Array com dados das cartas que estão viradas
let shownCards = [];


/* // Iteração para inserção das imagens embaralhadas
function begin() {
    
    

    for (let i = 1; i <= boardSize; i++) {
            // Variaveis da div e da img criadas
            let box = window.document.getElementById(`box${i}`);
            let img = window.document.createElement("img");
            // Adiciona o endereço da imagem
            img.setAttribute("src", `../imagens/${shuflleCard[i - 1]}.jpg`)
            // Adiciona a imagem na div
            box.appendChild(img);
            // Adiciona interação na div
            box.setAttribute("onclick", `toggleVisibility(this), gameRounds(this, ${i})`);
            // Lista com todas as caixas
            boxes.push(box);
            
    }
} */

// Muda a visibilidade das imagens clicadas
function toggleVisibility(el) {
    let imgStyle = el.querySelector("img").style;
    if (imgStyle.visibility == "visible") {
        imgStyle.visibility = "hidden";
    } else {
        imgStyle.visibility = "visible";
    }
}

function resetTable() {
    for (let i = 1; i <= boardSize; i++) {
        let box = window.document.querySelector(`#box${i}`);
        section.removeChild(box);
    }
}
function generateBoard() {
    win = false;
    selecionar();
    let shuffleCard = shuffleArray(allCards);
    for (let i = 1; i <= boardSize; i++) {
        let box = window.document.createElement("div");
        let img = window.document.createElement("img");
        box.setAttribute("id", `box${i}`)
        box.setAttribute("class", "box");
        // Adiciona o endereço da imagem
        img.setAttribute("src", `../imagens/${shuffleCard[i - 1]}.jpg`)
        // Adiciona a imagem na div
        box.appendChild(img);
        // Adiciona interação na div
        box.setAttribute("onclick", `toggleVisibility(this), gameRounds(this, ${i})`);
        // Lista com todas as caixas
        boxes.push(box);
        section.appendChild(box);
        document.getElementById("btnCharge").setAttribute("onclick","");
    }
}
// Lógica do jogo
let attempts=0;//armazaena numero de tentativas
function gameRounds(el, index) {
    //Variavel com os dados do elemento imagem
    let cardData = {
        name: el.querySelector("img").src,
        index: index,
        parent: el
    }
    // Adiciona os dados a lista de cartas viradas
    shownCards.push(cardData);
    // Se tiver dois elementos na lista
    if (shownCards.length == 2) {
        // Checa se o par de cartas viradas é um par ou não
        if (checkPair(shownCards)) {
            // Remove o atributo de click, deixa o cursor padrão e reseta a lista de cartas viradas
            for (let e of shownCards) {
                e.parent.removeAttribute("onclick")
                e.parent.style.cursor = "default";
                // Remove as caixas q foram viradas do array
                let indexOfRemove = boxes.indexOf(e.parent)
                if (indexOfRemove > -1) {
                    boxes.splice(indexOfRemove, 1);
                }
            }
            attempts+=1;
            checkEnd();
            shownCards = [];
        } else {
            //Espera um tempo, vira as cartas de volta e reseta a lista de cartas viradas
            attempts+=1;
            setTimeout(() => {
                for (let e of shownCards) {
                    toggleVisibility(document.getElementById(`box${e.index}`));
                }
                shownCards = [];
            }, 500);
        }
    }
}

// Checa se duas cartas são iguais
function checkPair(selectedEls) {
    return (selectedEls[0].parent != selectedEls[1].parent) && (selectedEls[0].name == selectedEls[1].name);
}


//Modo trapaça


//manipulando o botão trapaça
let b_trapaca = document.querySelector("#peaces");

b_trapaca.addEventListener('click', Mostrar);

function Mostrar() {
    
    for (box of boxes) {
        toggleVisibility(box)
    }
    console.log(b_trapaca.value)
    if (b_trapaca.value == "Mostrar Peças") {
        b_trapaca.value = "Esconder peças"
    } else {
        b_trapaca.value = "Mostrar Peças"
    }
}

let score=0;
let win = false;
function checkEnd(){
    setTimeout(function(){
        if (countContraTempo == 0) {
            window.alert("O tempo acabou :(")
            shuffleArray(allCards)
            resetTable()
            document.getElementById("back_time").setAttribute("onclick","verifyMode(this.id)");//habilita botoes de modo novamente
            document.getElementById("classic").setAttribute("onclick","verifyMode(this.id)");
            attempts=0;
        } else if(boxes.length == 0 && countContraTempo > -1){
            alert("fim de jogo!");
            alert("Sua pontuação foi: "+attempts+".");
            shuffleArray(allCards);
            resetTable();
            score++;
            document.getElementById("score").innerHTML="Partidas jogadas: "+score;
            win = true;
            conexaoPHP(0);
            countContraTempo = -1;
            document.getElementById("back_time").setAttribute("onclick","verifyMode(this.id)");
            document.getElementById("classic").setAttribute("onclick","verifyMode(this.id)");
            attempts=0;
        }
    }, 750);
}

let countContraTempo;
function verifyMode(id){
    generateBoard()
    if(id=="back_time"){
        modoDeJogo = -1;
        countContraTempo = 500 * tamanhoTab;
        initialTime = countContraTempo;
        document.getElementById("back_time").setAttribute("onclick","");//desabilita botes de modo de jogo(impede que clique vairas vezes)
        document.getElementById("classic").setAttribute("onclick","");
        document.getElementById("btnCharge").setAttribute("onclick","");
        setTimerContraTempo();
        return 1;
    }
    else if(id=="classic"){
        modoDeJogo = 1;
        countClassico = 0;
        document.getElementById("back_time").setAttribute("onclick","");
        document.getElementById("classic").setAttribute("onclick","");
        document.getElementById("btnCharge").setAttribute("onclick","");
        setTimerClassico();
        return 1;
    }
    else{
        return 0;
    }
}

//cronometro
var time = document.getElementById("timer");
function setTimerContraTempo(){
    if (countContraTempo > 0){
        countContraTempo -=1;
        time.innerText = "Contra o tempo: " + countContraTempo;
        setTimeout(setTimerContraTempo, 1000);
    } else {
        checkEnd()
    }

}

countClassico = 0;
function setTimerClassico(){
    countContraTempo = 10;
    if (!win) {
        countClassico += 1;
        time.innerText = "Clássico: " + countClassico;
        setTimeout(setTimerClassico, 1000);
    }
}

function endGame() {
    boxes = [];
    checkEnd();
}

function f5(){
    location.reload();
}
let tamanhoTab=1;
function selecionar() {
    var select = document.getElementById("btnCharge");
    var opcaoValor = select.value;
    let sctStyle = section.style;
    boardSize = parseInt(opcaoValor);
    switch (boardSize) {
        case 4:
            allCards = cards2.concat(cards2);
            sctStyle.gridTemplateColumns = "1fr 1fr";
            sctStyle.gridTemplateRows = "1fr 1fr";
            tamanhoTab=1;
            break;
        case 16:
            allCards = cards4.concat(cards4);
            sctStyle.gridTemplateColumns = "1fr 1fr 1fr 1fr";
            sctStyle.gridTemplateRows = "1fr 1fr 1fr 1fr";
            tamanhoTab=2;
            break;
        case 36:
            allCards = cards6.concat(cards6);
            sctStyle.gridTemplateColumns = "1fr 1fr 1fr 1fr 1fr 1fr";
            sctStyle.gridTemplateRows = "1fr 1fr 1fr 1fr 1fr 1fr";
            tamanhoTab=3;
            break;
        case 64:
            allCards = cards8.concat(cards8);
            sctStyle.gridTemplateColumns = "1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr";
            sctStyle.gridTemplateRows = "1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr";
            tamanhoTab=4;
            break;

    }
    console.log(boardSize);
}

function buttonPosition(){
    selecionar();
    switch (boardSize) {
        case 16:
            document.getElementById("game").id = "game_4x4"
            document.getElementById("return").id= "return_4x4";
            document.getElementById("peaces").id = "peaces_4x4";
            document.getElementById("ranking-btn").id = "ranking-btn_4x4";
            document.getElementById("alterate_btn").id = "alterate_btn_4x4";
            return selecionar();
    
        case 36:
            document.getElementById("game").id = "game_6x6"
            document.getElementById("classic").id = "classic_6x6";
            document.getElementById("return").id= "return_6x6";
            document.getElementById("peaces").id = "peaces_6x6";
            document.getElementById("ranking-btn").id = "ranking-btn_6x6";
            document.getElementById("alterate_btn").id = "alterate_btn_6x6";
            return selecionar();
        case 64:
            document.getElementById("game").id = "game_8x8"
            document.getElementById("classic").id = "classic_6x6";
            document.getElementById("return").id= "return_8x8";
            document.getElementById("peaces").id = "peaces_8x8";
            document.getElementById("ranking-btn").id = "ranking-btn_8x8";
            document.getElementById("alterate_btn").id = "alterate_btn_8x8";
            return selecionar();
    }
}
