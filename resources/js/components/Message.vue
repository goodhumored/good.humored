<template>
    <div class="row msg mx-0 pt-2 mt-1"> 
        <!-- Ава -->
        <Avatar :src="avatar" />
        <!-- /Ава -->
        <div class="col">
            <div class="row">
                <p class="font-weight-bold">{{name}}</p>
            </div>
            <div class="row px-4">
                {{text}}
            </div>
        </div>
    </div>
</template>

<script>
    import Avatar from './Avatar';
    export default {
        components: {
            Avatar
        },
        props: ['text', 'avatar', 'name'],
    }
</script>

<style>
    html {
        --msg-height: 96px;
    }
    
    .msg {
        min-height: var(--msg-height);
        border: solid 1px #f9f9f9;
    }
</style>