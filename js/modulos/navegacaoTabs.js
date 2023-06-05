export default function initNavTabs(){
    const tabMenu = document.querySelectorAll('[data-js-tabMenu-item]');
    const tabContent = document.querySelectorAll('[data-js-tabMenu-content]');
   
    if(tabMenu.length && tabContent.length){
        tabMenu[0].classList.add('ativo');
        tabContent[0].classList.add('ativo');
        function ativarTab(index){
            tabMenu.forEach((item)=>{
                item.classList.remove('ativo');
            });
            tabContent.forEach((content)=>{
                content.classList.remove('ativo');
            });
            tabMenu[index].classList.add('ativo');
            tabContent[index].classList.add('ativo');
        }
        
        tabMenu.forEach((itemMenu, index)=>{
            itemMenu.addEventListener('click',()=>{
                ativarTab(index);
            });
        });
    }
}