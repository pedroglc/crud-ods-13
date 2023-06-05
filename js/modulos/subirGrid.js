export default function initSubirGrid(){

    const btnTop = document.querySelector('[data-js-subirGrid-icon]');
    const main = document.querySelector('[data-js-main]');
    const header = document.querySelector('[data-js-header]');

    function subirGrid(){
        main.scrollTo(0,0);
        header.scrollIntoView();
    }
    function mostrarBtnTop(){
        main.scrollTop != 0 ? btnTop.classList.add('ativo') : btnTop.classList.remove('ativo');
    }

    btnTop.addEventListener('click', subirGrid);
    main.addEventListener('scroll', mostrarBtnTop);

}