$(document).ready(function(){


  $("#alta-administrador").validate({

    rules: {
        // simple rule, converted to {required:true}
        usuario: {
            required: true,
              remote: {
                  url: "../Controllers/functions.php",
                  type: "post",
                  data: {
                    valor: function() {
                      return $( "#alta-administrador #usuario" ).val();
                    },
                    action:"existeUser",
                    table: "tbl_admin",
                    campo: "usuario"
                  }
            }
        },
        email: {
              required: true,
              email: true,
              remote: {
                  url: "../Controllers/functions.php",
                  type: "post",
                  data: {
                    valor: function() {
                      return $( "#alta-administrador #email" ).val();
                    },
                    action:"existeUser",
                    table: "tbl_admin",
                    campo: "email"
                  }
            }
        },
        email_confirm: {
              required: true,
              email: true,
              equalTo: '#email'
        },
        password: {
              required: true,
              remote: {
                  url: "../Controllers/functions.php",
                  type: "post",
                  data: {
                    password: function() {
                      return $( "#alta-administrador #password" ).val();
                    },
                    action:"validPass"
                  }
              }
        },
        password_confirm: {
              required: true,
              equalTo: '#password'
        },
        rol: {
              required: true,
        }     

      },
      messages: {
            usuario:{
                  required: "Debe introducir su usuario",
                  remote: "El usuario ya se encuentra registrado"
            },
            email:{
                    required: 'Debe ingresar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                     remote: "El email ya se encuentra registrado"
            },
            email_confirm:{
                    required: 'Debe confirmar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                    equalTo: 'El correo electrónico debe coincidir'
            },
            password:{
                    required: 'Debe ingresar su contraseña',
                    remote: "Password inseguro. Tiene que ser de 8 caracteres, contener  1 mayúscula y 1 caracter especial."
            },
            password_confirm:{
                    required: 'Debe confirmar su contraseña',
                    equalTo: 'La contraseña debe coincidir'
            },
            rol:{
                  required: "Debe seleccionar un rol"
            }
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


  $("#editar-administrador").validate({

    rules: {
        // simple rule, converted to {required:true}
        usuario: {
            required: true,
              remote: {
                  url: "../../Controllers/functions.php",
                  type: "post",
                  data: {
                    valor: function() {
                      return $( "#editar-administrador #usuario" ).val();
                    },
                    id: function() {
                      return $( "#editar-administrador #id" ).val();
                    },
                    action:"existeUser",
                    table: "tbl_admin",
                    campo: "usuario"
                  }
            }
        },
        email: {
              required: true,
              email: true,
              remote: {
                  url: "../../Controllers/functions.php",
                  type: "post",
                  data: {
                    valor: function() {
                      return $( "#editar-administrador #email" ).val();
                    },
                    id: function() {
                      return $( "#editar-administrador #id" ).val();
                    },
                    action:"existeUser",
                    table: "tbl_admin",
                    campo: "email"
                  }
              }
        },
        email_confirm: {
              required: true,
              email: true,
              equalTo: '#email'
        },
        password_current: {
              required: true
        },    
        password: {
          required: false,
          remote: {
                  url: "../../Controllers/functions.php",
                  type: "post",
                  data: {
                    password: function() {
                      return $( "#editar-administrador #password" ).val();
                    },
                    action:"validPass"
                  }
              }
        },
        password_confirm: {
              required: {
                depends: function(element) {
                    return ($("#password").val() != '');
                }
              },
              equalTo: '#password'
        },
        rol: {
              required: true,
        }   

      },
      messages: {
            nombre:{
                    required: "Debe introducir su usuario",
                    remote: "El usuario ya se encuentra registrado"
            },
            email:{
                    required: 'Debe ingresar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                    remote: 'El email ya se encuentra registrado'
            },
            email_confirm:{
                    required: 'Debe confirmar su correo electrónico',
                    email: 'Debe ingresar un correo electrónico válido',
                    equalTo: 'El correo electrónico debe coincidir'
            },
            password:{
              remote: "Password inseguro. Tiene que ser de 8 caracteres, contener 1 mayúscula y 1 caracter especial."
            },
            password_current: {
              required: 'Debe ingresar su contraseña'
            },
            password_confirm:{
                    required: 'Debe confirmar su contraseña',
                    equalTo: 'La contraseña debe coincidir'
            },
            rol:{
                  required: "Debe seleccionar un rol"
            }
      },
      errorPlacement: function(error, element) {
          error.appendTo(element.parent());
      }
      


});


$('#alta-administrador, #editar-administrador').submit(function(){

      if(!$("#"+$(this).attr('id')).valid())
      {
        return false;

      }
      
  });



})