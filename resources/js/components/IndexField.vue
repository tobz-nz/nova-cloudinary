<template>
    <span>{{ field.value ? field.value.public_id : '' }}</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
}
</script>
