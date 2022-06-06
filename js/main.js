// var menuButton = document.getElementById( 'menu-button' );
// var menuPanel = document.getElementById( 'menu-panel' );
// menuButton.addEventListener( 'click', function( event ) {
//   if ( menuButton.getAttribute( 'aria-expanded' ) === 'true' ) {
//     menuButton.setAttribute( 'aria-expanded', 'false' );
//     menuPanel.setAttribute( 'aria-expanded', 'false' );
//   } else {
//     menuButton.setAttribute( 'aria-expanded', 'true' );
//     menuPanel.setAttribute( 'aria-expanded', 'true' );
//   }
// });

// smooth scroll
{
  const smoothScrollTrigger = document.querySelectorAll('a[href^="#"]');
  for (let i = 0; i < smoothScrollTrigger.length; i++){
    smoothScrollTrigger[i].addEventListener('click', (e) => {
      e.preventDefault();
      let href = smoothScrollTrigger[i].getAttribute('href');
      let target;
      if (href === '#top') {
        target = 0;
      } else {
        let targetElement = document.getElementById(href.replace('#', ''));
        const rect = targetElement.getBoundingClientRect().top;
        const offset = window.pageYOffset;
        target = rect + offset;
      }
      window.scrollTo({
        top: target,
        behavior: 'smooth',
      });
    });
  }
}

// scroll observer
{
  const item = document.querySelector('.scroll-observer');
  const showButton = (items) => {
    const button = document.getElementById('pagetop');
    items.forEach((item) => {
      item.isIntersecting ? button.setAttribute('data-scrolled', 'false') : button.setAttribute('data-scrolled', 'true');
    });
  }
  const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0
  }
  const observer = new IntersectionObserver(showButton, options);
  observer.observe(item);
}

// lightbox
{
  const items = document.querySelectorAll('[data-luminous]');
  if (items.length > 0) {
    items.forEach( (item) => {
      new Luminous(item, {sourceAttribute: 'data-luminous'});
    });
  }
}

// scroll hint
{
  new ScrollHint('.js-scroll-hint', {
    i18n: {
      scrollable: 'スクロールできます'
    }
  });
}