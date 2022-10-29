
// Y validate
const minY = -5;
const maxY = 5;
let answer;

qSelector("#yText").oninput = revalidateAns;
qSelector("#yText").onchange = revalidateAns;

function revalidateAns() {
    answer = validateY();
    qSelector("#wrongValueY").textContent=answer;
}
function qSelector(element) {
    return document.querySelector(element);
}

function validateY() {
    let y = qSelector("#yText").value;
    if (/[\s*]/.test(y) || y === "") {
        return "Y не может быть пустым";
    }

    y = y.trim();

    if (! ( /^-?\d*[.,]?\d+$/.test(y) )) {
        return "Y - десятичное число";
    }
    if (y < minY || y > maxY) {
        return minY + " <= Y <= " + maxY;
    }
    if (y.length > 10){
        return "Количество символов элемента Y < 11"
    }
    return "";
}

//R validate
const minR = 0;
const maxR = 4;
let answerR;

qSelectorR("#rText").oninput = revalidateAnsR;
qSelectorR("#rText").onchange = revalidateAnsR;

function revalidateAnsR() {
    answerR = validateR();
    qSelectorR("#wrongValueR").textContent=answerR;
}
function qSelectorR(element) {
    return document.querySelector(element);
}

function validateR() {

    let r = qSelectorR("#rText").value;

    if (/[\s*]/.test(r) || r === "") {
        return "R не может быть пустым";
    }

    r = r.trim();

    if (! ( /^-?\d*[.,]?\d+$/.test(r) )) {
        return "R - десятичное число";
    }
    if (r < minR || r > maxR) {
        return minR + " <= R <= " + maxR;
    }
    if (r.length > 10){
        return "Количество символов элемента R < 11"
    }

    return "";
}



function validateX() {
    let xSet = elByClassname("xBtn");
    let x;
    for (let i = 0; i < xSet.length; i++) {
        if (xSet[i].checked) {
            x = xSet[i].value;
            break;
        }
    }
    if (isNaN(x)) {
        return "Не выбран X";
    } else {
        return "";
    }
}

el("mainForm").addEventListener("submit", (e) => {
    let yAns = validateY();
    let xAns = validateX();
    let rAns = validateR();
    let answer = (yAns + xAns + rAns !== "" ? "Выстрел не осуществлен: " : "") +
        (yAns === "" ? yAns : yAns + "; ") +
        (xAns === "" ? xAns : xAns + "; ") +
        (rAns === "" ? rAns: rAns + "; ");
    qSelector("#buttonError").textContent = answer;
    if (answer.length > 0) {
        e.preventDefault();
    }
});

function el(element) {
    return document.getElementById(element);
}

function elByClassname(element) {
    return document.getElementsByClassName(element)
}