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
const deleteImage = document.querySelector('.delete');
let input;

const deleteImg = async () => {
    const domain = window.location.host;
    const urlForRequest = domain + '/deleteImg/';
    const idUser = document.querySelector('[name="idOfThisUser"]').value;

    let $rawResult = await fetch('', {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'accept': 'application/json'
        },
        body: JSON.stringify({ idUser, _token: '{{ $csrf_token()}}' })
    })
};

function toggleModal(element = null) {
    input = document.querySelector('[name="perfil-or-cover"]');

    if (element.classList.contains("profile-foto")) {
        input.value = 'profile';
    } else if (element.classList.contains("cover-fundo")) {
        input.value = 'cover';
    }
    else {
        input.value = 'nothing';
    }
    elementForChange.classList.toggle('upload-foto-change');
}

elementsWithImage.forEach((el) => el.addEventListener('click', () => toggleModal(el)));
document.querySelector('.changeState').addEventListener('click', (el) => toggleModal(el.target));
deleteImage.addEventListener('click', deleteImg);

/* 
let rawResult = await fetch('{{ route('task.update') }}', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({stateOfElement, idOfElement, _token: '{{ csrf_token() }}'
                })
                const result = await rawResult.json();//espera a resposta da requisicao
            if(!result.sucess) {
                element.checked = !element.checked;
                //poderia criar uma função informando que o bd não está funcionando ou algo assim
            } else {
                alert("Tarefa atualizada com Sucesso. Parabéns, rumo a constância!");
            }

 */