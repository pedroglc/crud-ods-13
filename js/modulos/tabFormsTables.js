export default function initTabFormTables(){
    const btns = document.querySelectorAll('[data-js-btnTabFormsTables]');
    const forms = document.querySelectorAll('[data-js-frmTabFormsTables]');
    const tables = document.querySelectorAll('[data-js-tableTabFormsTables]')
    
    btns.forEach((b, index) => {
        let status = true;

        function handleClick(){
            status = !status;
            
            b.classList.toggle('btnSubmitCadastrar')
            b.classList.toggle('cancelar');
            forms[index].classList.toggle('ativo');
            tables[index].classList.toggle('ocultar');

            return (status) ? b.innerText = 'Criar Novo' : b.innerText = 'Cancelar';
        }

        b.addEventListener('click', handleClick);
    });
}