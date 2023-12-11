const header = document.querySelector('header');
function fixedNavbar(){
    header.classList.toggle('scrolled',window.pageYOffset > 0)
}

fixedNavbar();
window.addEventListener('scroll', fixedNavbar);

let menu = document.querySelector('#menu-btn');
let userBtn = document.querySelector('#user-btn');

menu.addEventListener('click',function(){
    let nav = document.querySelector('.navbar');
    nav.classList.toggle('active');
})

userBtn.addEventListener('click',function(){
    let userBox= document.querySelector('.user-box');
    userBox .classList.toggle('active');
})

const closeBtn = document.querySelector('#close-form');

closeBtn.addEventListener('click',()=>{
    document.querySelector('.update-container').style.display='none'
})

/*slider*/

// $('.hero-slider').slick({
//     autoplay:true,
//     infinite:false,
//     speed:300,
//     nextArrow: $('.next'),
//     prevArrow: $('.prev')
// })

// $('.testimonial-slider').slick({
//     autoplay:true,
//     infinite:false,
//     speed:300,
//     nextArrow: $('.next1'),
//     prevArrow: $('.prev1')
// })

//new slider start
// const myslide= document.querySelectorAll('.myslider'),
//     dot = document.querySelectorAll('.dot');

// let counter = 1;
// slidefun(counter);

// let timer = setInterval(autoslide,8000);
// function autoslide(){
//     counter += 1;
//     slidefun(counter);
// }

// function plusSlide(n){
//     counter += n;
//     slidefun(counter);
//     resetTimer();
// }

// function currentSlide(n){
//     counter = n;
//     slidefun(counter);
//     resetTimer();
// }

// function resetTimer(){
//     clearInterval(timer);
//     timer = setInterval(autoslide,8000);
// }

// function slidefun(n){
//     let i;
//     for(i=0;i<myslide.length;i++){
//         myslide[i].style.display="none";
//     }
//     for(i=0;i<dot.length;i++){
//         dot[i].classList.remove('active');
//     }
//     if(n > myslide.length){
//         counter = 1;
//     }
//     if(n < 1){
//         counter = myslide.length;
//     }
//     myslide[counter-1].style.display="block";
//     dot[counter-1].classList.add('active')
// }

// //new slider end