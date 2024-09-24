import Swal from "sweetalert2";
import axios from 'axios';

export function show_alerta(mensaje,icono, foco=''){
    if(foco !== ''){
        document.getElementById(foco).focus();
    }
    Swal.fire({
        title : mensaje,
        icon: icono,
        customClass: {confirmButton: 'btn btn-primary', popup: 'animated zooIn'},
        buttonsStyling:false
    });
}

export function confirmar(id,titulo){
    var url ='http://127.0.0.1:8001/api/tarea/' + id;
    const SwalWithBootstrapButtons = Swal.mixin({
        customClass: {confirmButton: 'btn btn-success me-3', cancelButton: 'btn btn-danger'},
        buttonsStyling: false
    });
    SwalWithBootstrapButtons.fire({
        title : 'seguro de eliminar la tarea' + titulo,
        text: 'se perdera la informacion de la tarea',
        icon: 'question',
        showCancelButton:true,
        confirmButtonText: '<i class="fa-solid fa-chek"></i>Si, eliminar',
        cancelButtonText: '<i class="fa-solid fa-ban"></i>Cancelar'
    }).then((ressult) => {
        if(ressult.isConfirmed){
            enviarSolicitud('DELETE',{id:id},url,'tarea eliminado');
        }
        else{
            show_alerta('operacion canelada', 'info')
        }
    })
}

export function enviarSolicitud(metodo,parametros,url,mensaje){
    axios({method:metodo,url:url,data:parametros}).then(function(respuesta){
        
        var status = respuesta.data['status'];
        var mensaje = respuesta.data['message'];
        if(status === 200){            
            show_alerta(mensaje,'status');
           
            window.setTimeout(function(){
                window.location.href ='/';
            },1000);
        }else{            
            show_alerta(mensaje,'error');
        }
    }).catch(function(error){
        show_alerta('Error en la solicitud','error');
    });
}