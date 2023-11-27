/**
 * Responsible for configuring events on badges
 */
function setEventInBadges() {
    let badges = document.querySelectorAll("td span.badge");
    badges.forEach(badge => {
        badge.addEventListener("click", ({ target }) => {
            notiflixConfirm();
            Notiflix.Confirm.show(
                'Alterar status',
                'Realmente deseja alterar o status ?',
                'Sim',
                'Não',
                () => {
                    handleBadge(target);
                },
            );
        });
    });
}

/**
 * Responsible for manipulating badge visualization if it is active or inactive
 * @param {HTMLSpanElement} target 
 */
function handleBadge(target) {
    if (target.innerText === "Aprovada") {
        target.classList.remove("bg-success");
        target.classList.add("bg-danger");
        target.innerText = "Em espera";
        handleRequestStatus(target.dataset.id, "disable");
    }
    else {
        target.classList.remove("bg-danger");
        target.classList.add("bg-success");
        target.innerText = "Aprovada";
        handleRequestStatus(target.dataset.id, "enable");
    }
}

/**
 * Responsible for firing the request for updating
 * @param {String} id
 * @param {String} enableOrDisable
 */
async function handleRequestStatus(id, enableOrDisable) {
    const completeUrl = `/medical/approval/update-status?status=${enableOrDisable}&id=${id}`;
    const response = await fetch(`${BASE_URL}${completeUrl}`);

    if (response.ok)
        notiflixNotify("O status do usuário foi alterado com sucesso", "success");
}


function startEvents() {
    setEventInBadges();
}

startEvents();