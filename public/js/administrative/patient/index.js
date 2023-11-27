/**
 * Add the loading when the form is subjected
 */
function applyLoadingInForm(form) {
    fakeLoading("pulse");
    setTimeout(() => {
        form.submit();
    }, 1400);
}

/** Configures Submit event on the creation form */
function setEventSubmitInFormCreate() {
    if (form = document.getElementById("formPatientCreate"))
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
    const completeUrl = `/administrative/patient/update-status?status=${enableOrDisable}&id=${id}`;
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
    let modalCpf = document.getElementById("cpfUpdate");
    let modalDath = document.getElementById("dath_birthUpdate");
    let modalTelephone = document.getElementById("telephoneUpdate");
    let modalCep = document.getElementById("cepUpdate");
    let modalStreet = document.getElementById("streetUpdate");
    let modalNumberHome = document.getElementById("number_homeUpdate");
    let modalCity = document.getElementById("cityUpdate");
    let modalState = document.getElementById("stateUpdate");
    let modalStatus = document.getElementById("statusUpdate");
    let modalEmail = document.getElementById("emailUpdate");

    const response = await fetch(`${BASE_URL}/administrative/patient/find/${userId}`);
    let { message, message4Devs, data } = await response.json();
    if (!response.ok) {
        notiflixNotify(message, "error");
        console.log(message4Devs);
    }
    else {
        modalId.value = data.id;
        modalName.value = data.name;
        modalLastName.value = data.lastname;
        modalCpf.value = data.cpf;
        modalDath.value = data.dath_birth;
        modalTelephone.value = data.telephone;
        modalCep.value = data.cep;
        modalStreet.value = data.street;
        modalNumberHome.value = data.number_home;
        modalCity.value = data.city;
        modalState.value = data.state;
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
    const completeUrl = `/administrative/patient/delete?id=${id}`;
    const response = await fetch(`${BASE_URL}${completeUrl}`);

    if (response.ok) 
        window.location.reload();
        setTimeout(() => {
            notiflixNotify("O departamento foi excluído com sucesso", "success");
        }, 1000);
}

function formatCPFInput(input) {
    const cleanedValue = input.value.replace(/\D/g, '');
    const formattedValue = cleanedValue.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    input.value = formattedValue;
  }
  

function startEvents() {
    setEventSubmitInFormCreate();
    setClickInLink2Modal();
    setEventInBadges();
    setEventInDeleteLink();
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', () => {
        formatCPFInput(cpfInput);
    });
}

startEvents();