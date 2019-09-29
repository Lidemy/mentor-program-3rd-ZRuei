/* eslint-disable no-undef */

// task done
$( "ul" ).on( "click", "li", function() {
  $( this ).toggleClass( "task-done" );
} );

// delete task
$( "ul" ).on( "click", "span", function( e ) {
  $( this )
    .parent()
    .fadeOut( 600, function() {
      $( this ).remove();
    } );
  e.stopPropagation();
} );

// add new task
$( "form" ).submit( function( e ) {
  e.preventDefault();

  let todoText = $( "input" ).val();
  $( "input" ).val( "" );
  $( "ul" ).append( `
    <li class="list-group-item d-flex justify-content-between align-items-center">${todoText}
      <span class="badge"><i class="far fa-trash-alt"></i></span>
    </li>
	` );
} );
