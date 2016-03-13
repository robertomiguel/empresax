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

    $('#consultar' ).dialog({
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
    modal: true,
      height: 400,
      width: 500,
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
        },
        'Enviar Consulta': function() {
              grabarconsulta();
            }
    }
    });

    $('#ingresar' ).dialog({
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
    modal: true,
      height: 220,
      width: 400,
      autoOpen: false,
    buttons: {
        Cancelar: function() {
          $( this ).dialog( "close" );
        },
        Ingresar: function() {
              alert('Usuario y/o contraseña incorrecta');
              $( this ).dialog( "close" );
            }
    }
    });

    $('#plan84' ).dialog({
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

    $('#listaautos' ).dialog({
      position: { my: 'center', at: 'center', of: window },
      resizable: false,
    modal: true,
      height: 600,
      width: 600,
      autoOpen: false,
    buttons: {
        Imprimir: function() {
          $( this ).dialog( "close" );
        },
        Cerrar: function() {
          $( this ).dialog( "close" );
        }
    }
    });



$('.ui-dialog').addClass('sombra');
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

function consultar(){
  $('#nombre').val('');
  $('#consulta').val('');
  $('#tel').val('');
  $('#email').val('');
  $('#localidad').val('');
  $( "#consultar" ).dialog( "open" );
}

function grabarconsulta(){
  var nombre    = $('#nombre').val().trim();
  var consulta  = $('#consulta').val().trim();
  var tel       = $('#tel').val().trim();
  var email     = $('#email').val().trim();
  var localidad = $('#localidad').val().trim();

  if (nombre    == '')  { alert('Falta el Nombre');     return; }
  if (tel       == '')  { alert('Falta el Teléfono');   return; }
  if (localidad == '')  { alert('Falta la Localidad');  return; }
  if (email     == '')  { alert('Falta el E-Mail');     return; }
  if (consulta  == '')  { alert('Falta la Consulta');   return; }

  $.post("grabarconsulta",{
    nombre    : nombre    ,
    tel       : tel       ,
    localidad : localidad ,
    email     : email     ,
    consulta  : consulta
  },
    function(data){
      //$('#contenidoconsulta').html(data);
      if (data=='r:1') {
        alert('Consulta enviada, un representante se pondrá en contacto con usted.');
        $( "#consultar" ).dialog( "close" );      
      } else {
        alert('No se pudo enviar la consulta, intente más tarde.');
      }
  });
  

}

function ingresar(){
  $('#usuario').val('');
  $('#pass').val('');
  $( "#ingresar" ).dialog( "open" );
}

function plan84 () {
  $( "#plan84" ).dialog( "open" );
}

  function agregar(id, marca)
  {
    //$('#seleccion').html('<tr><td>'+$marca+'</td></tr>');

    if (!$('#'+id)[0].checked ){
      quitar(id);
    } else {
      $('#seleccion tr:last').after('<tr id=r'+id+'><td>'+marca+'</td></tr>');
    }

  }

  function quitar(id)
  {
    $('#r'+id).remove();
  }
  function verlistado()
  {
    var listaid = '';
    $("#seleccion tr").each(function() 
      {
          $this = $(this);
          var firstName = $this.get(0).id.replace('r','');
          
          if (listaid=='')
          {
            listaid = firstName;
          } else {
            listaid = listaid + ',' + firstName;
          }
          
      });
      
      $.post("verlistado",{
        lista: listaid
      },function(data){
            //$('#contenido').html(data);
            alert(data);
            
      });
  }