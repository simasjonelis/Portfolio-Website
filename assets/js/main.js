// Menu show and hidden
const navMenu = document.getElementById('nav-menu');
const navToggle = document.getElementById('nav-toggle');
const navClose = document.getElementById('nav-close');

if (navToggle) {
  navToggle.addEventListener('click', () => {
    navMenu.classList.add('show-menu');
  });
}

if (navClose) {
  navClose.addEventListener('click', () => {
    navMenu.classList.remove('show-menu');
  });
}

// Remove menu on mobile when clicking a link
const navLinks = document.querySelectorAll('.nav__link');

function closeMenu() {
  if (navMenu.classList.contains('show-menu')) {
    navMenu.classList.remove('show-menu');
  }
}

navLinks.forEach((navLink) => {
  navLink.addEventListener('click', closeMenu);
});

// Accordion for Skills
const skillsContents = document.querySelectorAll('.skills_content');
const skillsHeaders = document.querySelectorAll('.skills_header');

function toggleSkills() {
  const itemClass = this.parentNode.className;

  skillsContents.forEach((content) => {
    content.className = 'skills_content skills_close';
  }

  if (itemClass === 'skills_content skills_close') {
    this.parentNode.className = 'skills_content skills_open';
  }
}

skillsHeaders.forEach((header) => {
  header.addEventListener('click', toggleSkills);
});

// Qualification Tabs
const tabs = document.querySelectorAll('[data-target]');
const tabContents = document.querySelectorAll('[data-content]');

tabs.forEach((tab) => {
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.target);

    tabContents.forEach((content) => {
      content.classList.remove('qualification_active');
    });

    target.classList.add('qualification_active');

    tabs.forEach((tab) => {
      tab.classList.remove('qualification_active');
    });

    tab.classList.add('qualification_active');
  });
});

// Swiper for Portfolio
const swiper = new Swiper('.portfolio_container', {
  cssMode: true,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

// Scroll Sections Active Link
const sections = document.querySelectorAll('section[id]');

function scrollActive() {
  const scrollY = window.pageYOffset;

  sections.forEach((section) => {
    const sectionHeight = section.offsetHeight;
    const sectionTop = section.offsetTop - 50;
    const sectionId = section.getAttribute('id');

    const navLink = document.querySelector(`.nav_menu a[href*=${sectionId}]`);
    
    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
      navLink.classList.add('active-link');
    } else {
      navLink.classList.remove('active-link');
    }
  }
}

window.addEventListener('scroll', scrollActive);

// Change Background Header on Scroll
function scrollHeader() {
  const header = document.getElementById('header');
  
  if (this.scrollY >= 80) {
    header.classList.add('scroll-header');
  } else {
    header.classList.remove('scroll-header');
  }
}

window.addEventListener('scroll', scrollHeader);

// Show Scroll Up Button
function showScrollUp() {
  const scrollUp = document.getElementById('scroll-up');
  
  if (this.scrollY >= 560) {
    scrollUp.classList.add('show-scroll');
  } else {
    scrollUp.classList.remove('show-scroll');
  }
}

window.addEventListener('scroll', showScrollUp);

// Dark/Light Theme Switcher
const themeButton = document.getElementById('theme-button');
const darkTheme = 'dark-theme';
const iconTheme = 'uil-sun';
const selectedTheme = localStorage.getItem('selected-theme');
const selectedIcon = localStorage.getItem('selected-icon');

const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light';
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'uil-moon' : 'uil-sun';

if (selectedTheme) {
  document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme);
  themeButton.classList[selectedIcon === 'uil-moon' ? 'add' : 'remove'](iconTheme);
}

themeButton.addEventListener('click', () => {
  document.body.classList.toggle(darkTheme);
  themeButton.classList.toggle(iconTheme);
  localStorage.setItem('selected-theme', getCurrentTheme());
  localStorage.setItem('selected-icon', getCurrentIcon());
});
