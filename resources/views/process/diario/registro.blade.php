<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <div class="form">
               @csrf
              <div class="row" style="margin-left: 3cm;">
                <div class="col-md-4">
                     <label>Cuentas</label>
                    <select name="de_cuenta[]" class="form-control " placeholder="P. U.">
                        <option selected="selected" readonly>Seleccionar</option>
                           @foreach($cuentas as $key)
                        <option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>
                                 @endforeach
                    </select> 
                </div> 
                 <div class="col-md-4">
                     <label>Monto</label>
                    <input type="text" name="de_monto[]" class="form-control"  placeholder="M. U."/>
                </div>
                <div class="col-md-1">
                   <label style="color: white;">...</label>
                    <a href="javascript:void(0);" class="add_button btn btn-info" title="Agregar">+</a>
                </div>
          
               </div>
            </div>

<br>
<p style="margin-left: 3.3cm;">&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;&macr;</p>
    
<div class="form2">
               @csrf
              <div class="row" style="margin-left: 3cm;">
                <div class="col-md-4">
                     <label>Cuentas</label>
                    <select name="a_cuenta[]" class="form-control " placeholder="P. U.">
                        <option selected="selected" readonly>Seleccionar</option>
                           @foreach($cuentas as $key)
                        <option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>
                                 @endforeach
                    </select> 
                </div> 
                 <div class="col-md-4">
                     <label>Monto</label>
                    <input type="text" name="a_monto[]" class="form-control"  placeholder="M. U."/>
                </div>
                <div class="col-md-1">
                   <label style="color: white;">...</label>
                    <a href="javascript:void(0);" class="add_button2 btn btn-info" title="Agregar">+</a>
                </div>
          
               </div>
            </div>


<script type="text/javascript">
$(document).ready(function () {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.form'); //Input field wrapper
    var fieldHTML = '<div class="form-group">'+
    '<div class="row" style="margin-left: 3cm;">'+
        '<div class="col-md-4">' +
          '<label>Cuentas</label>'+
        ' <select name="de_cuenta[]" class="form-control" title="pu" placeholder="P. U.">'+
         '<option selected="selected" readonly>Seleccionar</option>'+
                 ' @foreach($cuentas as $key)'+
                   '<option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>'+
                  ' @endforeach'+
          '</select> ' +
        '</div>' +
         '<div class="col-md-4">' +
           '<label>Monto</label>'+
        '<input type="number" name="de_monto[]" class="form-control "  placeholder="M. U."/>' +
        '</div>' +
        
        '<label style="color: white;">...</label>'+
       
        '<a href="javascript:void(0);" style="width: 0.9cm; height: 1cm; margin-top: 0.7cm;" class="remove_button btn btn-danger" title="Eliminar">x</a>' +
      
 
      
      '</div>'+
    '</div>';
    var x = 1; //Initial field counter is 1
    $(addButton).click(function () { //Once add button is clicked
        if (x < maxField) { //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });

    $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    /*$(document).on('keyup', ".form-group", function () {
      /*  var cantidad = $(this).find("input[title=cantidad]").val();*/
   /*     var pu = $(this).find("input[title=pu]").val();*/

       /* $(this).find("[title=subtotal]").html(parseInt(cantidad) * parseInt(pu));*/

        //subtotal = cantidad * pu;
        //document.formulario_01.subtotal.value = subtotal;
   /* });*/
});




</script>

<script type="text/javascript">
$(document).ready(function () {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button2'); //Add button selector
    var wrapper = $('.form2'); //Input field wrapper
    var fieldHTML = '<div class="form-group">'+
    '<div class="row" style="margin-left: 3cm;">'+
        '<div class="col-md-4">' +
          '<label>Cuentas</label>'+
        ' <select name="a_cuenta[]" class="form-control" title="pu" placeholder="P. U.">'+
         '<option selected="selected" readonly>Seleccionar</option>'+
                 ' @foreach($cuentas as $key)'+
                   '<option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>'+
                  ' @endforeach'+
          '</select> ' +
        '</div>' +
         '<div class="col-md-4">' +
           '<label>Monto</label>'+
        '<input type="number" name="a_monto[]" class="form-control "  placeholder="M. U."/>' +
        '</div>' +

        '<label style="color: white;">...</label>'+
        '<a href="javascript:void(0);" style="width: 0.9cm; height: 1cm; margin-top: 0.7cm;" class="remove_button2  btn btn-danger" title="Eliminar">x</a>' +

      
      '</div>'+
    '</div>';
    var x = 1; //Initial field counter is 1
    $(addButton).click(function () { //Once add button is clicked
        if (x < maxField) { //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });

    $(wrapper).on('click', '.remove_button2', function (e) { //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    /*$(document).on('keyup', ".form-group", function () {
      /*  var cantidad = $(this).find("input[title=cantidad]").val();*/
   /*     var pu = $(this).find("input[title=pu]").val();*/

       /* $(this).find("[title=subtotal]").html(parseInt(cantidad) * parseInt(pu));*/

        //subtotal = cantidad * pu;
        //document.formulario_01.subtotal.value = subtotal;
   /* });*/
});




</script>





        




