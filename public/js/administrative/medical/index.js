/**
 * Add the loading when the form is subjected
 */
 function applyLoadingInForm(form) {
    fakeLoading("pulse");
    setTimeout(() => {
        form.submit();
    }, 1600);
}

/** Configures Submit event on the creation form */
function setEventSubmitInFormCreate() {
    if (form = document.getElementById("formMedicalCreate"))
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            applyLoadingInForm(e.target);
        })
}


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
    if (target.innerText === "Ativo") {
        target.classList.remove("bg-success");
        target.classList.add("bg-danger");
        target.innerText = "Inativo";
        handleRequestStatus(target.dataset.id, "disable");
    }
    else {
        target.classList.remove("bg-danger");
        target.classList.add("bg-success");
        target.innerText = "Ativo";
        handleRequestStatus(target.dataset.id, "enable");
    }
}

/**
 * Responsible for firing the request for updating
 * @param {String} id
 * @param {String} enableOrDisable
 */
async function handleRequestStatus(id, enableOrDisable) {
    const completeUrl = `/administrative/medical/update-status?status=${enableOrDisable}&id=${id}`;
    const response = await fetch(`${BASE_URL}${completeUrl}`);

    if (response.ok)
        notiflixNotify("O status do usuário foi alterado com sucesso", "success");
}

/**
 * Responsible for configuring the click event on the links to fire the change modal
 */
 function setClickInLink2Modal() {
    let elements = document.querySelectorAll(".link2modal");
    for (const element of elements) {
        element.addEventListener("click", ({ target }) => {
            console.log(target.dataset.id);
            triggerModal(target.dataset.id);
        })
    }
}

/**
 * Responsible for opening the change modal
 * @param {String} userId 
 */
 function triggerModal(userId) {
    fillModal(userId);
    document.getElementById("buttonTrigger").click();
}

/**
 * Responsible for filling the modal with user data
 * @param {String} userId 
 */
 async function fillModal(userId) {
    let modalId = document.getElementById("idUpdate");
    let modalName = document.getElementById("nameUpdate");
    let modalLastName = document.getElementById("lastnameUpdate");
    let modalDescription = document.getElementById("departmentsIdUpdate");
    let modalSpecialty = document.getElementById("specialtyUpdate");
    let modalTelephone= document.getElementById("telephoneUpdate");
    let modalStatus = document.getElementById("statusUpdate");
    let modalEmail = document.getElementById("emailUpdate");
    
    const response = await fetch(`${BASE_URL}/administrative/medical/find/${userId}`);
    let { message, message4Devs, data } = await response.json();
    if (!response.ok) {
        notiflixNotify(message, "error");
        console.log(message4Devs);
    }
    else {
        modalId.value = data.id;
        modalName.value = data.name;
        modalLastName.value = data.lastname;
        modalDescription.value = data.departments_id;
        modalSpecialty.value = data.specialty;
        modalTelephone.value = data.telephone;
        modalStatus.value = data.status;
        modalEmail.value = data.email;
    }
}

/**
 * Responsible for configuring the delete event on a specific link
 */
 function setEventInDeleteLink() {
    const deleteLink = document.getElementById("deleteLink");
    if (deleteLink) {
        deleteLink.addEventListener("click", () => {
            const itemId = document.getElementById("idUpdate").value;
            notiflixConfirm();
            Notiflix.Confirm.show(
                'Excluir',
                'Realmente deseja excluir este item?',
                'Sim',
                'Não',
                () => {
                    handleDelete(itemId);
                },
            );
        });
    }
}

/**
 * Responsible for firing the request for updating
 * @param {String} id
 */
 async function handleDelete(id) {
    const completeUrl = `/administrative/medical/delete?id=${id}`;
    const response = await fetch(`${BASE_URL}${completeUrl}`);

    if (response.ok) 
        window.location.reload();
        setTimeout(() => {
            notiflixNotify("O departamento foi excluído com sucesso", "success");
        }, 1000);
}

function startEvents() {
    setEventSubmitInFormCreate();
    setEventInBadges();
    setClickInLink2Modal();
    setEventInDeleteLink();
}

startEvents();