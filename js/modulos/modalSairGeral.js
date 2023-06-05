export default function initModalSairGeral(){
    //MODAL SAIR
    const wrapperModalSair = document.querySelector('.wrapper-modal-sair');
    const boxModalSair = document.querySelector('.box-modal-sair');
    const btnSair = document.querySelectorAll('.js-btn-sair');

    function onModal(){
        wrapperModalSair.classList.toggle('ativo');
    }

    function offModal(e){
        if(!boxModalSair.contains(e.target))wrapperModalSair.classList.remove('ativo');
    }

    btnSair.forEach((btn)=>{
        btn.addEventListener('click', onModal);
    });

    wrapperModalSair.addEventListener('click',offModal);
}