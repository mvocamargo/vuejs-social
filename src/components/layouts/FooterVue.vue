<template>
    <footer class="page-footer" :class="cor">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                <h5 class="white-text">{{logo || 'Sem logo :-('}}</h5>
                <p class="grey-text text-lighten-4">{{descricao || 'Nada'}}</p>
                </div>
                <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <slot></slot>
                </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
            © {{ ano || 2014}} Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
        </div>
    </footer>
</template>
<script>
    export default {
        name: 'FooterVue',
        props: ['cor', 'logo', 'descricao', 'ano'],
        data(){
            
        }
    }
</script>
