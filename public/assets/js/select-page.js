function sayHello() {
    
    const url = window.location.pathname.split('/');
    changeClassOfElement(url[url.length-1]);
    
}
const changeClassOfElement = (url) => {
    if(!url) {
        url = 'home';
    }
    try {
        const elementForActivated = document.querySelector('.' + url);
        elementForActivated.classList.add('active');

    } catch(e) {
        console.log(e);
    }
}
