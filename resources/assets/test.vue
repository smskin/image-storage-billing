<template>

</template>

<script>
    export default {
        created: function(){
            Promise.all([
                import('jquery').then((a) => {return a.default}),
                import('select2').then((a) => {return a.default}),
            ]).then(([$]) => {
                /* apply select2 */
            });
        }
    }
</script>
