<template>
    <app-layout title="View Activity">
        <FakeModal>
            <template #content>
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ $t('activities_view_slug') }}: {{dados.slug}}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            <i class="far fa-clock"></i> {{ $t('activities_view_datedesc') }}:
                            <span class="font-extrabold">
                                {{dados.horario}}
                            </span>
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <i class="text-red-500 far fa-id-card"></i> {{ $t('activities_card_createdby') }}:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{dados.criado_por}}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <i class="fas fa-directions"></i> {{ $t('activities_view_description') }}:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{dados.descricao}}
                                </dd>
                            </div>
                            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <i class="text-blue-500 fas fa-info-circle"></i> {{ $t('activities_view_type') }}:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                                    {{dados.tipo}}
                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <i class="fas fa-list-ol"></i> {{ $t('activities_card_players') }}:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{dados.jogadores}}
                                </dd>
                            </div>
                           <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <i class="fas fa-spinner"></i> {{ $t('activities_view_progress') }}:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="p-6 space-y-2 artboard phone">
                                        <progress class="progress" :value="nParticipantes" :max="dados.jogadores"></progress>
                                    </div>

                                </dd>
                            </div>
                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <i class=" text-green-400 fas fa-grin-wink"></i> {{ $t('activities_view_jointxt') }}:
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="btn-group">
                                        <input type="hidden" v-model="dados.id">
                                        <button v-show="!(participando)" @click="save(dados)" class="btn btn-success">{{ $t('activities_view_joinbtn') }}</button>
                                        <button v-show="participando" @click="quit(dados)" class="btn btn-error">{{ $t('activities_view_leavebtn') }}</button>
                                        <Link :href="route('activity.index')" class="btn btn-outline">{{ $t('activities_view_closebtn') }}</Link>
                                    </div>
                                </dd>
                            </div>

                           <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    <i class="far fa-address-book text-indigo-400"></i>
                                    {{ $t('activities_view_participants') }}:
                                </dt>
                               <dt v-if="participantes < 1" class="text-sm font-medium text-gray-500">
                                   <i class="far fa-folder-open"></i>
                                   {{ $t('activities_view_noparticipants') }}
                               </dt>

                                <ol v-else class="list-none md:list-decimal xs:ml-6 md:ml-4">
                                    <li v-for="participante in participantes">
                                        {{participante.name}}
                                    </li>
                                </ol>
                            </div>
                        </dl>
                    </div>
                </div>
            </template>
        </FakeModal>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import FakeModal from "../../Components/FakeModal";
import {Link} from '@inertiajs/inertia-vue3';

export default {
    name: "ViewActivity",
    components: {FakeModal, AppLayout, Link},
    data(){
        return{
            dados:{
                id: null
            }
        }
    },
    props:[
        'dados',
        'nParticipantes',
        'participando',
        'participantes'
    ],
    methods:{
        save: function (dados){
            this.$inertia.post('/activity/join/'+dados.id,dados)
        },
        quit: function (dados) {
            this.$inertia.post('/activity/quit/'+dados.id,dados)
        },
    }

}
</script>
