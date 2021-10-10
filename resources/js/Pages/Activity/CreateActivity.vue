<template>
    <app-layout title="Create Activity">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Activity
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <div>
                        <InfoAlert/>
                    </div>
                    <button @click="toogleModal()"
                            :class="$page.props.permission.activity.create ? 'my-4 inline-flex w-full btn btn-outline btn-primary'
                            : 'my-4 inline-flex w-full btn btn-disabled'">
                        Iniciar atividade
                    </button>
                </div>
            </div>
        </div>
<!--        <div v-show="isOpen">
            <div class="modal modal-open">
                <div class="modal-box">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <form @submit.prevent="form.post('/activity/')">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Atividade desejada</label>
                                <select id="categoriaId" v-model="form.categoria_id" required>
                                    <option value="">Escolha a atividade desejada</option>
                                    <option v-for="(categoria) in categorias" :key="categoria.id" :value="categoria.id">
                                        {{ categoria.descricao }}
                                    </option>
                                </select>
                                <div v-if="errors.categoria_id">{{ errors.categoria_id }}</div>
                            </div>
                            <div class="mb-4">
                                <label for="horaAtividade"
                                       class="block text-gray-700 text-sm font-bold mb-2">Horário da Atividade:</label>
                                <input type="datetime-local"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       id="horaAtividade" v-model="form.horario_atv" required>
                                <div v-if="errors.horario_atv">{{ errors.horario_atv }}</div>

                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Número de
                                    jogadores:</label>
                                <select id="qtdJogadores" v-model="form.qtd_jogadores" required>
                                    <option value="">Defina o número de jogadores totais</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <div v-if="errors.qtdJogadores">{{ errors.qtdJogadores }}</div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Observações:</label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="obsAtividade" v-model="form.observacao"
                                    placeholder="Favor usar tal tipo de arma | Ter paciência"></textarea>
                                <div v-if="errors.observacao">{{ errors.observacao }}</div>

                            </div>
                            <div class="flex flex-row modal-action">
                                <button type="submit" class="btn btn-success" :disabled="form.processing">Submit
                                </button>
                                <button @click="$emit.close()" class="btn">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <DialogModal :show="isOpen" @close="toogleModal()">
            <template #title>
                Creating activity..
            </template>
            <template #content>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Atividade desejada</label>
                    <select id="categoriaId" v-model="form.categoria_id" required>
                        <option value="">Escolha a atividade desejada</option>
                        <option v-for="(categoria) in categorias" :key="categoria.id" :value="categoria.id">
                            {{ categoria.descricao }}
                        </option>
                    </select>
                    <div v-if="errors.categoria_id">{{ errors.categoria_id }}</div>
                    <div class="mb-4">
                        <label for="horaAtividade"
                               class="block text-gray-700 text-sm font-bold mb-2">Horário da Atividade:</label>
                        <input type="datetime-local"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                               id="horaAtividade" v-model="form.horario_atv" required>
                        <div v-if="errors.horario_atv">{{ errors.horario_atv }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Número de
                            jogadores:</label>
                        <select id="qtdJogadores" v-model="form.qtd_jogadores" required>
                            <option value="">Defina o número de jogadores totais</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                        <div v-if="errors.qtd_jogadores">{{ errors.qtd_jogadores }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Observações:</label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="obsAtividade" v-model="form.observacao"
                            placeholder="Favor usar tal tipo de arma | Ter paciência"></textarea>
                        <div v-if="errors.observacao">{{ errors.observacao }}</div>
                    </div>
                </div>
            </template>
            <template #footer>
                <button type="submit" @click="submit()" class="btn btn-sm btn-success mr-1" :disabled="form.processing">Submit
                </button>
            </template>
        </DialogModal>
        <div v-show="atividades.data.length" class="py-5">
            <div class="xs:max-w-1xl sm:max-w-2xl md:max-w-5xl lg:max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <ListUserActivity :atividades="atividades"></ListUserActivity>
                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>

import AppLayout from "../../Layouts/AppLayout";
import Modal from "../../Jetstream/Modal";
import InfoAlert from "../../Components/InfoAlert";
import {ref} from "vue";
import {useForm} from '@inertiajs/inertia-vue3'
import {usePage} from '@inertiajs/inertia-vue3';
import ListUserActivity from "./ListUserActivity";
import DialogModal from "../../Jetstream/DialogModal";

export default {
    name: "CreateActivity",
    components: {ListUserActivity, Modal, AppLayout, InfoAlert, DialogModal},
    props: {
        atividades: Object,
        categorias: Object,
        errors: Object
    },
    setup(props) {
        let isOpen = ref(false);
        let editMode = ref(false);

        function toogleModal() {
            isOpen.value = !isOpen.value
        }
        const form = useForm({
                categoria_id: null,
                horario_atv: null,
                qtd_jogadores: null,
                observacao: null,
                _token: usePage().props.value.csrf_token });

        function submit(){
            form.post('/activity/');
        }
        return {form, isOpen, editMode, toogleModal, submit};
    }
}
</script>

