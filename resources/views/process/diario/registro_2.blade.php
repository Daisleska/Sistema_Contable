<div class="modal fade" id="bs-example-modal-xl2" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
              <div class="modal-header">
                <?php
                $fecha= date('d-m-Y');
                ?>
                <h5 style="margin-left: 1cm;" class="modal-title" id="myExtraLargeModalLabel">Registro en libro Diario</h5><hr>                <h5 class="modal-title" id="myExtraLargeModalLabel">Fecha: {{$fecha}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                </div>

                <?php
                $fecha_enviar= date('Y-m-d');
                ?>

                <input type="hidden" name="fecha" value="{{$fecha_enviar}}">

             <div class="modal-body">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
              
             <!-- Start second data -->
                
                    @csrf
             
                <div class="col-md-2 form2">
                     <label>Cuentas</label>
                    <select name="cuenta[]" class="form-control " title="pu" placeholder="P. U.">
                           @foreach($cuentas as $key)
                        <option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>
                                 @endforeach
                    </select> 
                </div> 
                 <div class="col-md-2">
                     <label>Monto</label>
                    <input type="text" name="momto[]" class="form-control"  placeholder="M. U."/>
                </div>
                <div class="col-md-1">
                    <a href="javascript:void(0);" class="btn-info add_button2 form-control " title="Agregar"><i data-feather="plus"></i></a>
                </div>

               

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>


             </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button2'); //Add button selector
    var wrapper = $('.form2'); //Input field wrapper
    var fieldHTML = '<div class="form-group">' +
    '<div class="row">'+
        '<div class="col-md-2 ">' +
          '<label>Cuentas</label>'+
        ' <select name="cuenta[]" class="form-control" title="pu" placeholder="P. U.">'+
                 ' @foreach($cuentas as $key)'+
                        '<option value="{{$key->id}}">{{$key->nombre}}-({{$key->codigo}})</option>'+
                                ' @endforeach'+
          '</select> ' +
        '</div>' +
         '<div class="col-md-2">' +
           '<label>Monto</label>'+
        '<input type="number" name="monto[]" class="form-control "  placeholder="M. U."/>' +
        '</div>' +
        '&nbsp;&nbsp;<a href="javascript:void(0);" class="col-md-1 btn-danger remove_button2" title="Eliminar"><i data-feather="time"></i></a>' +
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