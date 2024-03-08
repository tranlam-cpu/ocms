
  const hamburgerMenu = document.querySelector('#hamburger-menu')
  const mobileMenu = document.querySelector('#mobile-menu')
  hamburgerMenu.classList.toggle('open')
  const mobileLink= document.querySelector('.mobile-link')

  hamburgerMenu.addEventListener('click', ()=>{
    mobileMenu.classList.toggle('hidden')
    hamburgerMenu.classList.toggle('open')
    mobileLink.classList.toggle('showLink')
  })


  class MenuSub{
    constructor(MenuItem){
      this.MenuItem=MenuItem;
    }


    setMenuSubWidth(){ 
      this.MenuItem.style.minWidth=this.MenuItem.parentElement.offsetWidth+"px"
      this.MenuItem.style.textAlign ="left"
      
    }

    setStyleMenuParent(){
      if(this.MenuItem.children.length>=1){
        this.MenuItem.parentElement.classList.toggle('nav-item-bg')
        this.MenuItem.parentElement.children[0].classList.toggle('menu-parent')
      }else{
        this.MenuItem.parentElement.classList.toggle('nav-item-parent')
      }
    }
  }

  var a=$('.nav-sub')

  $.each(a,(index,item)=>{
    var ob=new MenuSub(item)    
   
    ob.setStyleMenuParent();
    ob.setMenuSubWidth();
  })

