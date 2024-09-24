<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="#">Tareas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <router-link to="/" class="nav-link" href="#">Listar <span class="sr-only">(current)</span></router-link>
        </li>
        <li class="nav-item">
          <router-link to="/create" class="nav-link" href="#">Crear</router-link>
        </li>
      </ul>     
    </div>
  </nav>
  
  <div class="container-fluid">
    <router-view/>
  </div>
</template>

