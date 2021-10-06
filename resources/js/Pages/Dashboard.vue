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
                    <div>
                        <InfoAlert/>
                    </div>

                </div>
            </div>
        </div>
        <div class="pt-2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="info in dados">
                    <div class="m-6 indicator">
                        <div class="indicator-item badge badge-primary">NOVA</div>
                        <CardActivity
                            :id = info.id
                            :slug = info.slug
                            :tipo="info.tipo">
                            <template #descricao>
                                {{info.descricao}}
                            </template>
                            <template #observacao>
                                {{info.observacao}}
                            </template>
                            <template #horario>
                                {{info.horario}}
                            </template>
                            <template #jogadores>
                                {{info.jogadores}}
                            </template>
                            <template #usuario>
                                {{info.usuario}}
                            </template>
                            <template #conferir>
                                {{info.slug}}
                            </template>
                        </CardActivity>
                    </div>
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
    import InfoAlert from "../Components/InfoAlert";
    import CardActivity from "../Components/CardActivity";

    export default defineComponent({
        components: {
            CardActivity,
            InfoAlert,
            ContainerCard,
            AppLayout,
            Welcome,
        },
        props:[
            'dados'
        ]
    })
</script>
