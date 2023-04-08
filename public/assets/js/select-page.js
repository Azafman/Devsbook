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

document.querySelector('.profile-foto').addEventListener('click', toggleModal);
document.querySelector('.changeState').addEventListener('click', toggleModal); 
function toggleModal() {
    elementForChange.classList.toggle('upload-foto-change');
}