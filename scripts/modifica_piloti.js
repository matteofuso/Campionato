const delete_id = document.getElementById('deleteFormId');

function delete_pilota(numero){
    delete_id.value = numero;
}

const original_id = document.getElementById('editFormId');
const edit_id = document.getElementById('edit-numero');
const edit_nome = document.getElementById('edit-nome');
const edit_cognome = document.getElementById('edit-cognome');
const edit_nazionalita = document.getElementById('edit-nazionalita');
const edit_casa_automobilistica = document.getElementById('edit-casa-automobilistica');

function edit_pilota(btn, numero){
    row = btn.parentElement.parentElement;
    original_id.value = numero;
    edit_id.value = numero;
    edit_nome.value = row.cells[1].innerText;
    edit_cognome.value = row.cells[2].innerText;

    nazionalita = edit_nazionalita.options;
    for (let i = 0; i < nazionalita.length; i++) {
        if (nazionalita[i].value == row.cells[3].innerText) {
            nazionalita[i].selected = true;
        }
    }

    casa_automobilistica = edit_casa_automobilistica.options;
    for (let i = 0; i < casa_automobilistica.length; i++) {
        if (casa_automobilistica[i].value == row.cells[4].innerText) {
            casa_automobilistica[i].selected = true;
        }
    }
}

const editFormPunteggio = document.getElementById('editFormPunteggio');
const editFormId = document.getElementById('editFormId');
const editFormCodice = document.getElementById('editFormCodice');

function edit_gp(punteggio, gara, pilota){
    editFormPunteggio.value = punteggio;
    editFormId.value = gara;
    editFormCodice.value = pilota;
}

const deleteFormId = document.getElementById('deleteFormId');
const deleteFormCodice = document.getElementById('deleteFormCodice');

function delete_gp(gara, pilota){
    deleteFormId.value = gara;
    deleteFormCodice.value = pilota;
}