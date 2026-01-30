document.getElementById('einfügen').onsubmit = testen;

function testen() {
    let name = document.getElementsByName("abName")[0].value;
    let ort = document.getElementsByName("abOrt")[0].value;

    name = name.toLowerCase();
    ort = ort.toLowerCase();

    if (/[äöü]/.test(name)) {
        alert("Der Name darf keine Umlaute enthalten!");
        return false; // stops submit
    }

    if (ort !== "linz" && ort !== "wels" && ort !== "steyr") {
        alert("Der Ort muss Linz, Wels oder Steyr sein!");
        return false;
    }

    return true; // allows submit
}
