<template>
    <div class="overline red--text px-4" v-if="text">{{ text[0] }}</div>
</template>

<script>
export default {
    props: {
        text: {
            type: Array
        }
    }
};
</script>
