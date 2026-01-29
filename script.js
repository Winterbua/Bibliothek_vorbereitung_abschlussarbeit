document.getElementById('einfügen').onsubmit = testen;

function testen() {
    let name = document.getElementsByName("abName")[0].value;
    let ort = document.getElementsByName("abOrt")[0].value;

    name = name.toLowerCase();
    ort = ort.toLowerCase();

    if (ort !== "linz" && ort !== "wels" && ort !== "steyr") {
    alert("Der Ort muss Linz, Wels oder Steyr sein!");
    return false;
    }

    if (name == "ä" && name == "ö" && name == "ü") {
    alert("Der Name darf keine Umlaute enthalten!");
    return false;
    }
}
