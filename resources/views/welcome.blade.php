<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Meu Cep</title>

<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/bootstrap.min.js') }}">
<style>

.b-example-divider {
height: 3rem;
background-color: rgba(0, 0, 0, .1);
border: solid rgba(0, 0, 0, .15);
border-width: 1px 0;
box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
}

@media (min-width: 992px) {
.rounded-lg-3 { border-radius: .3rem; }
}

.bd-placeholder-img {
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none;
}

@media (min-width: 768px) {
.bd-placeholder-img-lg {
font-size: 3.5rem;
}
}

</style>


  </head>
    <body>
      @if(!$flag)
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Cep inválido!</strong> Verifique o cep informado e tente novamente!

</div>
@endif




      <main>
        <h1 class="visually-hidden">Meu Cep</h1>
          <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold">Meu Cep <i class="fas fa-mail-bulk"></i></h1>
            <br>
            <div class="col-lg-6 mx-auto">
              <form id="parametros" class="needs-validation" novalidate action='index' method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleInputEmail1">Informe seu cep para pesquisa:</label>
                  <input type="text" name="cep" class="form-control" id="InputCep"
                   placeholder="Cep" required onkeypress="return onlynumber();" maxlength="8" minlength="8">
                  <div class="invalid-feedback">
                    Por favor, informe um CEP válido.
                  </div>
                </div>
                <br>
                <button type="submit" class="btn btn-outline-secondary">Pesquisar <i class="fas fa-search"></i></button>
              </form>
            </div>
          </div>
          @if($address)
          <div class="px-4 py-5 my-5 ">
            <h3 class="display-7 fw-bold">Cep Informado:</h1>
            <h5 class="display-8 fw-bold">{{$address->cep}}</h1>
            <h3 class="display-7 fw-bold">Rua:</h1>
            <h5 class="display-8 fw-bold">{{$address->logradouro}}</h1>
            <h3 class="display-7 fw-bold">Bairro:</h1>
            <h5 class="display-8 fw-bold">{{$address->bairro}}</h1>
            <h3 class="display-7 fw-bold">Estado:</h1>
            <h5 class="display-8 fw-bold">{{$address->uf}}</h1>
              @endif

          </div>

    </body>




<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


function onlynumber(evt) {
   var theEvent = evt || window.event;
   var key = theEvent.keyCode || theEvent.which;
   key = String.fromCharCode( key );
   //var regex = /^[0-9.,]+$/;
   var regex = /^[0-9.]+$/;
   if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
   }
}

</script>
</html>
