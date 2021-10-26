<template>
    <app-layout :title="$t('categories_create')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$t('categories_create')}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <div>
                        <InfoAlert/>
                    </div>
                    <div class="flex justify-center">
                        <span>{{$t('categories_intro')}}</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="sm:max-w-2xl md:max-w-5xl lg:max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="flex justify-end itens-center">
                        <button @click="toogleModal()" class="btn btn-sm btn-primary">
                            {{$t('categories_create_btn')}}
                        </button>
                    </div>
                    <DialogModal :show="isOpen" @close="toogleModal()">
                        <template #title>
                            {{$t('activities_create_modal_title')}}
                        </template>
                        <template #content>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">{{$t('categories_create_type')}}:</label>
                                <select id="categoriaId" v-model="form.tipo">
                                    <option value="raid">RAID</option>
                                    <option value="pve">PVE</option>
                                    <option value="pvp">PVE</option>
                                    <option value="diversos">DIVERSOS</option>

                                </select>

                                <div class="mb-4">
                                    <div v-if="errors.tipo">{{ errors.tipo }}</div>
                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">{{
                                        $t('categories_create_desc') }}:</label>
                                    <textarea
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="obsAtividade" v-model="form.descricao"
                                    ></textarea>
                                    <div v-if="errors.descricao">{{ errors.descricao }}</div>
                                </div>
                            </div>
                        </template>
                        <template #footer>
                            <button type="submit" @click="submit()" class="btn btn-sm btn-success mr-1"
                                    :disabled="form.processing">
                                {{$t('submit')}}
                            </button>
                        </template>
                    </DialogModal>

                    <div class="mt-3 bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                        <table class="table-fixed min-w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">#</th>
                                <th class="px-4 py-2">{{ $t('categories_create_type') }}</th>
                                <th class="px-4 py-2">{{ $t('categories_create_desc') }}</th>
                                <th class="px-4 py-2">{{$t('categories_create_actions')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="categoria in categorias.data" :key="categoria.id">
                                <td class="border px-4 py-2 text-center ">{{ categoria.id }}</td>
                                <td class="border px-4 py-2 text-center uppercase">{{ categoria.tipo }}</td>
                                <td class="border px-4 py-2 text-center">{{ categoria.descricao }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <Link :href="route('category.edit', { id: categoria.id })"
                                          class="btn btn-sm btn-outline btn-accent mr-1">
                                        {{ $t('edit') }}
                                    </Link>
                                    <button @click="deleteCat(categoria.id)" class="btn btn-sm btn-error">
                                        {{$t('delete')}}
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            <jet-pagination class="m-5" :links="categorias.links"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import {Link, useForm, usePage} from "@inertiajs/inertia-vue3";
import JetPagination from "../../Components/Pagination";
import InfoAlert from "../../Components/InfoAlert";
import {Inertia} from "@inertiajs/inertia";
import DialogModal from "../../Jetstream/DialogModal";
import JetInput from '@/Jetstream/Input.vue';
import {ref} from 'vue'

export default {
    name: "IndexCategory",
    components: {
        AppLayout,
        Link,
        JetPagination,
        InfoAlert,
        DialogModal,
        JetInput
    },
    props: {
        categorias: Object,
        errors: Object
    },
    setup(props) {
        let isOpen = ref(false)
        const toogleModal = function () {
            isOpen.value = !isOpen.value;
        }
        const form = useForm({
            tipo: null,
            descricao: null,
            _token: usePage().props.value.csrf_token
        });

        function submit() {
            form.post('/category/');
            form.reset();
            toogleModal();
        }

        const deleteCat = (catId) => {
            const result = confirm("Tem certeza?");
            if (result) {
                Inertia.delete(route("category.destroy", catId), {
                    preserveScroll: true,
                });
            }
        };
        return {deleteCat, toogleModal, form, submit, isOpen};
    }
}
</script>
