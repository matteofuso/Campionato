
const deleteFormId = document.getElementById("deleteFormId");

function delete_gara(id) {
    deleteFormId.value = id;
}

const editFormId = document.getElementById("editFormId");
const data = document.getElementById("edit-data");
const tempo_migliore = document.getElementById("edit-tempo-migliore");

function edit_gara(btn, id) {
    const row = btn.parentNode.parentNode;
    editFormId.value = id;
    data.value = row.cells[2].innerText;
    tempo_migliore.value = row.cells[3].innerText;
}