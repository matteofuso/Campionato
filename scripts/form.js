document.body.querySelectorAll('form .form-select-insert').forEach((select) => {
    select.addEventListener('change', (e) => {
        const insertTargets = document.getElementsByClassName(e.target.getAttribute("data-insert-target"));
        if (e.target.value == -1) {
            for (let i = 0; i < insertTargets.length; i++) {
                insertTargets[i].parentElement.classList.remove('d-none');
                insertTargets[i].parentElement.classList.add('d-block');
                insertTargets[i].required = true;
            }
        } else {
            for (let i = 0; i < insertTargets.length; i++) {
                insertTargets[i].parentElement.classList.remove('d-block');
                insertTargets[i].parentElement.classList.add('d-none');
                insertTargets[i].required = false;
                if (insertTargets[i].tagName == 'SELECT') {
                    insertTargets[i].selectedIndex = 0;
                    insertTargets[i].dispatchEvent(new Event('change', { bubbles: true }));
                }
            }
        }
    })
})