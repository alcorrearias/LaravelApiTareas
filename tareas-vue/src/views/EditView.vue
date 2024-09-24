<template>
  <div class="row mt-3">
  <div class="col-md-6 offset-md-3"></div>
      <div class="card">        
          <div class="card-header bg-dark text-white text-center">Editar Tarea</div>
          <div class="card-body"></div>
          <form v-on:submit="guardar">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa-solid fa-comment"></i></span>
              <input type="text" id="titulo" class="form-control" v-model="titulo" maxlength="50" placeholder="titulo" required>
            </div>
            <div class="form-group mb-3">
              <label class="" for="FormControlSelect1">Estado</label>
              <select class="form-control" id="FormControlSelect1" v-model="estado" required>
                <option>Pendiente</option>
                <option>Completada</option>               
              </select>
            </div>
            <div class="d-grid col-6 mx-auto">
              <button class="btn btn-success"><i class="fa-solid  fa-floppy-disk"></i>Guardar</button>
            </div>
          </form>
      </div>
  </div>
</template>
<script>
  import {show_alerta, enviarSolicitud} from '../funciones';
  import { useRoute } from 'vue-router';
  import axios from 'axios';

  export default{
    data(){
      return {id:0, titulo:'', estado:'', url: 'http://127.0.0.1:8001/api/tarea'}
    },
    mounted(){
      const route = useRoute();
      this.id = route.params.id;
      this.url = this.url + '/' + this.id;
      this.getTarea();
    },
    methods: {
      getTarea(){
        
        axios.get(this.url).then(
              response => (
                this.id = response.data['dato']['id'],
                this.titulo = response.data['dato']['titulo'],
                this.estado = response.data['dato']['estado'] == 0 ? 'Pendiente' : 'Completada'
                )
          )
      },
      guardar(){
          event.preventDefault();
          if(this.titulo.trim() === ''){
            show_alerta('Escribe el titulo de la tarea','warning','titulo');
          }
          if(this.estado.trim() === ''){
            show_alerta('escoge el estado de la tarea','warning','estado');
          }
          else{
            var estadoSelect = this.estado.trim() == 'Pendiente' ? 0 : 1;
            var parametros = {titulo: this.titulo.trim(), estado: estadoSelect};
            enviarSolicitud('PUT', parametros, this.url,'tarea actualizada');
          }
      }
    }
  }
</script>
