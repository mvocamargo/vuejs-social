<template>
    <div>
        <nav :class="cor || 'orange'">
            <div class="nav-wrapper container">
            <router-link :to="url || '/'" class="brand-logo">{{ logo || 'Site'}}</router-link>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><router-link to="/">Home</router-link></li>
                <slot></slot>
            </ul>
            </div>
        </nav>
    </div>
</template>
<script>
    export default{
        name: 'NavBar',
        props: ['logo', 'url', 'cor'],
        data (){
            return{

            }
        }
    }        
</script>