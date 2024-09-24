<template>
  <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>
                  #
                </th>
                <th>
                  titulo
                </th>
                <th>
                  estado
                </th>
                <th>
                  acciones
                </th>
              </tr>
            </thead>
            <tbody class="table-group-divider" id="contenido">
              <tr v-for="tarea, i in tareas" :key="tareas.id">
                <td>{{ tarea.id }}</td>
                <td>{{ tarea.titulo }}</td>
                <td>{{ tarea.estado }}</td>
                <td>
                  <router-link :to="{path:'edit/'+ tarea.id}" class="btn btn-warning"> 
                    <i class="fa-solid fa-edit"></i>Editar
                  </router-link>
                  <button class="btn btn-danger" v-on:click="eliminar(tarea.id,tarea.titulo)">
                    <i class="fa-solid fa-trash"></i>Borrar
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </div>
</template>
<script>
  import axios from 'axios';
  import {confirmar} from '../funciones';
  
  export default{
    data(){
      return {tareas:null}
    },
    mounted(){
      this.getTareas();
    },
    methods: {
      getTareas(){
          axios.get('http://127.0.0.1:8001/api/tareas').then(
              response=> ( this.tareas = response.data)
          )
      },
      eliminar(id,titulo){
        confirmar(id, titulo);
      }
    }
  }
</script>
