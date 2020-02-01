/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('adminpanel', require('./components/adminpanel.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#adminApp',
});
/**
 * Use Here Ajax 
 */
$('#search').keyup(function(){
    if($(this).val()){
    $.ajax({
        url: '/getsearch',
        type: 'GET',
        data:'search='+$(this).val(),
        success: function(data) {
            $('#resultSearch').html(data);
            $('#resultSearch').show();
         }
    });
    }
    else{
        $('#resultSearch').hide();
    }
  });
  $('#reg_user').click(function(){
    $('#errormssg').html('');
    var error=true;
      if(!$('#name_user').val()){
          $('#errormssg').append('<li>Plaese enter your name!</li>');
          $('#errormssg').fadeIn(500);
          error=false;
      }
      if(!$('#email_user').val()){
        $('#errormssg').append('<li>Plaese enter your email!</li>');
        $('#errormssg').fadeIn(500);
        error=false;
    }
    if(!$('#pass_user').val()){
        $('#errormssg').append('<li>Plaese enter your password!</li>');
        $('#errormssg').fadeIn(500);
        error=false;
    }
    if(!$('#repass_user').val()){
        $('#errormssg').append('<li>Plaese enter your re-password!</li>');
        $('#errormssg').fadeIn(500);
        error=false;
    }
    if($('#pass_user').val() != $('#repass_user').val()){
        $('#errormssg').append('<li>your password not equal re-password</li>');
        $('#errormssg').fadeIn(500);
        error=false;
    }
    if(error){
        $('#errormssg').fadeOut();
        var data = {     // create object -- by Ahmad WAlid
            nameuser    : $('#name_user').val(),
            emailuser   : $('#email_user').val(),
            passuser    : $('#pass_user').val()
            }
        $.ajax({
            url: '/reg_user',
            type: 'GET',
            data:   data,
            success: function(feedback) {
                $('#sucssmssg').show();
                $('#name_user').val("");
                $('#email_user').val("");
                $('#pass_user').val("");
                $('#repass_user').val("");
             }
        });
    }
  });
  
  
  $('#loginbtn').click(function(){
    var errorlogin=true;
    $('#errormssglogin').html('');
    if(!$('#email').val()){
      $('#errormssglogin').append('<li>Plaese enter your email!</li>');
      $('#errormssglogin').fadeIn(500);
      errorlogin=false;
    }
    if(!$('#password').val()){
      $('#errormssglogin').append('<li>Plaese enter your password!</li>');
      $('#errormssglogin').fadeIn(500);
      errorlogin=false;
    }
    if(errorlogin){
      $('#errormssglogin').fadeOut(500);
      var data = {     // create object -- by Ahmad WAlid
        emailuser   : $('#email').val(),
        passuser    : $('#password').val()
        }
    $.ajax({
        url: '/login_user',
        type: 'GET',
        data:   data,
        success: function(feedback) {
          if(feedback==0){
            $('#errormssglogin').append('<li>Email Or Password Error.</li>');
            $('#errormssglogin').fadeIn(500);
          }
          else{
            window.location.href='/';
          }
         }
        });
    }
  });

  /**
   * Function For follow and like  
   */
  $("*[id*=follow]").click(function(){
    var id = this.id.match(/\d+/);
    var fo = $(this).text().replace(/\s/g, '');
    if(fo === 'Unfollow') fo=2;else fo=1;
    $.ajax({
        url: '/followupdate',
        type: 'GET',
        data: 'follow_tatus='+ fo + '&id_series_follow='+id,
        success: function(feedback) {
            if($('#follow_'+feedback).html() === '<i class="fas fa-plus-circle"></i> Follow '){
                $('#follow_'+feedback).html('<i class="fas fa-minus-circle"></i> Unfollow ');
            }
            else{
                $('#follow_'+feedback).html('<i class="fas fa-plus-circle"></i> Follow ');
            }
            
         }
        });
  });
  //////////LIKE///////////////
  