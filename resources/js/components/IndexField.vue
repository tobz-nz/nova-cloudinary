<template>
    <img class="align-bottom rounded w-12 h-12" style="object-fit: cover;" :src="field.value">
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
