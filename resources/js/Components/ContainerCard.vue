<template>
    <div>
        <div class="p-6">
            <div class="flex items-center">
                <i :class="icone"></i>
                <div class="ml-3 text-lg font-semibold">
                    <slot name="titulo"></slot>
                </div>
            </div>

            <div class="ml-8">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        <p>
                            <slot name="corpo"></slot>
                        </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ContainerCard",
    props:[
        'icone',
        'titulo',
        'corpo'
    ],
    computed:{
    }
}
</script>

<style scoped>

</style>
