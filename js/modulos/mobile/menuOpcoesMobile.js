export default function initMenuOpcoesMobile(){
    // MOBILE - MENU DE OPÇÕES
    const mobOptionsIcon = document.querySelector('.menu-options-mobile');

    function mostrarMenuMobile(){
        const mobOptionsMenu = document.querySelector('.menu-box-options-mobile');
        
        function ocultarMenuMobile(e){
            if(!mobOptionsIcon.contains(e.target)) mobOptionsMenu.classList.remove('ativo');
        }
        window.addEventListener('click', ocultarMenuMobile);
        mobOptionsMenu.classList.add('ativo');
    }

    mobOptionsIcon.addEventListener('click', mostrarMenuMobile);
}