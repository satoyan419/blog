document.addEventListener('DOMContentLoaded', function() {
  var menuButton = document.getElementById( 'menu-button' );
  var menuPanel = document.getElementById( 'menu-panel' );
  menuButton.addEventListener( 'click', function( event ) {
    if ( menuButton.getAttribute( 'aria-expanded' ) === 'true' ) {
      menuButton.setAttribute( 'aria-expanded', 'false' );
      menuPanel.setAttribute( 'aria-expanded', 'false' );
    } else {
      menuButton.setAttribute( 'aria-expanded', 'true' );
      menuPanel.setAttribute( 'aria-expanded', 'true' );
    }
  } );
});


const smoothScrollTrigger = document.querySelectorAll('a[href^="#"]');
for (let i = 0; i < smoothScrollTrigger.length; i++){
  smoothScrollTrigger[i].addEventListener('click', (e) => {
    e.preventDefault();
    let href = smoothScrollTrigger[i].getAttribute('href');
      let targetElement = document.getElementById(href.replace('#', ''));
    const rect = targetElement.getBoundingClientRect().top;
    const offset = window.pageYOffset;
    // const gap = 60;
    // const target = rect + offset - gap;
    const target = rect + offset;
    window.scrollTo({
      top: target,
      behavior: 'smooth',
    });
  });
}