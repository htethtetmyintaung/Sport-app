<script setup>
import { RouterLink, RouterView } from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'
</script>

<template>

  <header>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <img alt="Vue logo" class="logo" src="@/assets/sport.jpg" width="75" height="75" />

    <div class="headbar">

      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/about">About</RouterLink>
        <RouterLink to="/team">Team</RouterLink>
        <RouterLink to="/game">Game</RouterLink>
        <RouterLink to="/register">Register</RouterLink>
        <RouterLink to="/login">Login</RouterLink>
        <button @click="logout">Logout</button>
        <!-- <RouterLink to="/logout">logout</RouterLink> -->
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style >
header {
  line-height: 1.5;
  /* max-height: 100vh; */

  border-bottom: 1px solid #0005;
}

.headbar {
  width: 75%;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 2rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    align-content: center;
    justify-content: space-around;
    place-items: center;
    /* padding-right: calc(var(--section-gap) / 2); */
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    /* margin-left: -1rem; */
    font-size: 1.3rem;

    /* padding: 1rem 0; */
    /* margin-top: 1rem; */
    margin: 0;
    padding: 0;
  }
}
</style>

<script>
import axios from 'axios';

export default {
  methods: {
    logout() {
       const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
       axios.defaults.headers.common['Authorization'] = `Bearer ${csrfToken}` 
        // axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;
      axios.post('http://127.0.0.1:8000/api/logout') // Adjust the API endpoint as needed
        .then(() => {
          // Clear user data, token, or perform any other client-side cleanup if needed
          // Redirect to the login page or perform any other post-logout actions
          // For example, you can use Vue Router to redirect to the login page
          this.$router.push('/login');
        })
        .catch(error => {
          console.error('Logout error:', error);
        });
    },
  },
};
</script>
