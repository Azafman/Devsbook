function sayHello() {

    const url = window.location.pathname.split('/');
    changeClassOfElement(url[url.length - 1]);

}
const changeClassOfElement = (url) => {
    if (!url) {
        url = 'home';
    }
    try {
        const elementForActivated = document.querySelector('.' + url);
        elementForActivated.classList.add('active');

    } catch (e) {
        console.log(e);
    }
}

const elementForChange = document.querySelector('.upload-foto');
const elementsWithImage = document.querySelectorAll('.fundo');
let input = document.querySelector('[name="perfil-or-cover"]');


function toggleModal(element = null) {
    input = document.querySelector('[name="perfil-or-cover"]');

    window.location.href
    if (element.classList.contains("profile-foto")) {
        input.value = 'perfil';
    } else if (element.classList.contains("cover-fundo")) {
        input.value = 'cover';
    }
    else {
        input.value = 'nothing';
    }
    elementForChange.classList.toggle('upload-foto-change');
}
const deleteImage = document.querySelector('.delete');
const deleteImg = async () => {
    const domain = window.location.host;
    const urlForRequest = 'http://' + domain + '/delete-img';
    const idUser = document.querySelector('[name="idOfThisUser"]').value;
    const typeDelete = input.value;

    let rawResult = await fetch(urlForRequest, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'accept': 'application/json'
        },
        body: JSON.stringify({
            idUser,
            typeDelete,
            _token: window.csrf_token
        })
    })
    
    window.location.href = window.location.href;//reload page
    let result = await rawResult.json();
    
};

elementsWithImage.forEach((el) => el.addEventListener('click', () => toggleModal(el)));
document.querySelector('.changeState').addEventListener('click', (el) => toggleModal(el.target));
deleteImage.addEventListener('click', deleteImg);
