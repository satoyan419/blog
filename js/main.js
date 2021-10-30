var menuButton = document.getElementById( 'menu-button' );
var menuPanel = document.getElementById( 'menu-panel' );

( function() {
  menuButton.addEventListener( 'click', function( event ) {
    if ( menuButton.getAttribute( 'aria-expanded' ) === 'true' ) {
      menuButton.setAttribute( 'aria-expanded', 'false' );
      menuPanel.setAttribute( 'aria-expanded', 'false' );
    } else {
      menuButton.setAttribute( 'aria-expanded', 'true' );
      menuPanel.setAttribute( 'aria-expanded', 'true' );
    }
  } );
}() );