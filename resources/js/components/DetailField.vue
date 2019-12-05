<template>
    <panel-item :field="field">
        <template slot="value">
            <img class="align-bottom rounded w-40 h-40" style="object-fit: cover;" :src="field.value">
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
