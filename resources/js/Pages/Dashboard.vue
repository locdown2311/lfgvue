<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ContainerCard
                    icone="fas fa-users">
                        <template #titulo>
                            Precisando de companhia para jogar?
                        </template>
                        <template #corpo>
                            <p>Comece procurando uma atividade existente abaixo.</p>
                            <p>Caso não encontre, crie uma.</p>
                        </template>

                    </ContainerCard>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import ContainerCard from "../Components/ContainerCard";

    export default defineComponent({
        components: {
            ContainerCard,
            AppLayout,
            Welcome,
        },
    })
</script>
