$(document).ready(function() {
   $('.imagenes').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 3000,
});
	
	  $('#ventana' ).dialog({
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
	  modal: true,
      height: 655,
      width: 800,
      autoOpen: false,
      show: {
        effect: 'clip',
        duration: 500
      },
      hide: {
        effect: 'clip',
        duration: 500
      },
	  buttons: {
        Cerrar: function() {
          $( this ).dialog( "close" );
      	}
	  }
    });

});

function cargarlista(marca){
  $( ".ui-dialog-title" ).html('Lista por Marca');
  $( "#ventana" ).dialog( "open" );
  $.post("marcalistado",{
    marca: marca
  },
    function(data){
      $('#contenido').html(data);
  });
}

function rubrolistado(rubro){
  $( ".ui-dialog-title" ).html('Lista por Rubro');
  $( "#ventana" ).dialog( "open" );
  $.post("rubrolistado",{
    rubro: rubro
  },
    function(data){
      $('#contenido').html(data);
  });
}

function laempresa(){
  $( ".ui-dialog-title" ).html('La Empresa');
  $( "#ventana" ).dialog( "open" );
  $.post("laempresa",{},
    function(data){
      $('#contenido').html(data);
  });
}
