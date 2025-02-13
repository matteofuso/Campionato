
const deleteFormId = document.getElementById('deleteFormId');

function delete_ca(nome){
    deleteFormId.value = nome;
}

const editFormId = document.getElementById('editFormId');
const ca_nome = document.getElementById('ca-nome');
const ca_livrea = document.getElementById('new-livrea');

function edit_ca(btn, name){
    row = btn.parentElement.parentElement;

    editFormId.value = name;
    ca_nome.value = row.cells[0].innerText;
    ca_livrea.value = row.cells[1].innerText;
}
