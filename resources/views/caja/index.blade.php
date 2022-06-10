<!doctype html>
<html lang="en">
  <head>
    <!-- Bootstrap CSS -->
    <!-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>-->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <script  src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" aplazar ></script>
    <title>Caja</title>

    <style>
      .fondo-pago{
        top: 0%;
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: -2;  
      }

      .caja-container{
          margin-top: 1rem;
          width: 66%;
      }

      .area-pagos {
          border-radius: 2rem;
      }

      .sub-pagos{
        display: flex;
        justify-content: center;
        padding: 1rem;
      }

      .buttons{
        
      }

      .button-mesa{
         display: flex;
        justify-content: space-evenly; 
      }

      .icon-mesa{
        width: 4rem;
      }

      .option-mesa{
        columns: 5 150px;
        column-gap: 2em;
      }

      .icon-client{
        width: 4rem;
      }

      .option-client{
        columns: 5 150px;
        column-gap: 2em;
      }

      .search{

      }

      .button-busca{
        border-color: rgb(0 0 0);
        border-radius: 10px;
        margin-bottom: 5px;
      }

      .icon-search{
        width: 1.3rem;
      }

      .table-box{
        display: block;
        width: 100%;
        overflow-y: scroll;
        height: 10rem;
      }

      .porcentaje{
        display: flex;
        margin-top: 1rem;
      }

      .prop{
        width: 5rem;
      }

      .full{
        margin-bottom: 2rem;
      }

      .cobro{

      }
    </style>  
  </head>
<body>
  <img src="https://firebasestorage.googleapis.com/v0/b/restaurante-729c6.appspot.com/o/DineIn%2Fcaja%2FAppRestaurante_Pago_BG.jpg?alt=media&token=8b5a1095-d6b6-4ab0-83ac-43e94d7e4229" class="fondo-pago">

  <div class="container caja-container">
    <div class="card area-pagos">
      <div class="card-body">
          <h4 class="sub-pagos">Forma de Pago</h4>
            <div x-data="main()" class="buttons">
                <div class="button-mesa">
                    <img @click="client = !client" src="https://firebasestorage.googleapis.com/v0/b/restaurante-729c6.appspot.com/o/DineIn%2Fcaja%2FAppRestaurante_Pago_Comensal%C3%8Dcono.png?alt=media&token=96bf9859-027d-4039-a0c6-b2bee41babce" class="icon-client">
                </div>
                <br>
              <form>
                <div x-show="client">
                  <div class="all-client">
                    <input type="checkbox" id="all" name="all" value="second_checkbox" checked onClick="habilitaDeshabilita(this.form)"><label for="all">Todos los clientes</label><br>
                  </div>
                  <div class="option-client">
                    <input type="checkbox" id="client" name="client" value="second_checkbox"> <label for="cbox2">Cliente 1</label><br>
                    <input type="checkbox" id="client" name="client" value="second_checkbox"> <label for="cbox2">Cliente 2</label><br>
                    <input type="checkbox" id="client" name="client" value="second_checkbox"> <label for="cbox2">Cliente 3</label><br>
                    <input type="checkbox" id="client" name="client" value="second_checkbox"> <label for="cbox2">Cliente 4</label><br>
                  </div>
                </div>
              </form>
                
            </div>    
                
                <br>
                <div class="search">
                  <button class="btn btn- button-busca" type="submit">Buscar
                    <svg class="icon-search" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                  </button>  
                </div>
        <form action="/cobrar" >
          <div class="table-responsive table-box">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No° de Mesa</th>
                  <th scope="col">Comensal</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Precio</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $items as $items )
                <tr>
                  <td>{{$items->order->table->name}}</td>
                  <td>{{$items->order->name}}</td> 
                  <td>{{$items->saucer->name}}</td>
                  <td>{{$items->saucer->price}}</td>
                </tr>
                @endforeach 
              </tbody>
            </table>
          </div>
          <div class="porcentaje">
           <h4>% Propina:</h4><input type="number" name="numero" max="100" class="prop">
          </div>
          <div class="full">
            <h4>Total a pagar: $ pesos </h4>
          </div>
          <div align="center" class="cobro" >
            <button type="submit" class="btn btn-primary">Cobrar</button>
          </div>
          
        </form>
      </div>
    </div>
  </div>

  <script>

    function main(){
      return{
        client:false
      }
    }

    function habilitaDeshabilita(form){

      if (form.all.checked == false){
        form.client[0].disabled = false;
        form.client[1].disabled = false;
        form.client[2].disabled = false;
        form.client[3].disabled = false;
      }

      if (form.all.checked == true){
        form.client[0].disabled = true;
        form.client[1].disabled = true;
        form.client[2].disabled = true;
        form.client[3].disabled = true;
      }
    }

  </script>

</body>
</html>