let menu = document.querySelector('.menu-bars i');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

let navLinks = document.querySelectorAll('header .navbar a');

navLinks.forEach(link => {
  link.addEventListener('click', () => {
    navLinks.forEach(nav => nav.classList.remove('active'));
    link.classList.add('active');
  });
});

let sections = document.querySelectorAll('section');

window.onscroll = () => {
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');

  let scrollY = window.scrollY;

  sections.forEach(section => {
    let sectionHeight = section.offsetHeight;
    let sectionTop = section.offsetTop - 150;
    let sectionId = section.getAttribute('id');

    if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
      navLinks.forEach(link => {
        link.classList.remove('active');
        document.querySelector('header .navbar a[href*=' + sectionId + ']').classList.add('active');
      });
    }
  });
}

// slideshow
let slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) { 
  showDivs(slideIndex += n)
}

function showDivs(n) { 
  let i;
  let x = document.getElementsByClassName("mySlides");
  console.log(x.length);
  if (n > x.length) slideIndex = 1;
  else if (n < 1)  slideIndex = x.length ;
  for (i = 0; i < x.length; i++) { 
    x[i].style.display = "none"
  }
  x[slideIndex - 1].style.display = "block";
}
setInterval(() => { 
  plusDivs(1);
}, 4000)