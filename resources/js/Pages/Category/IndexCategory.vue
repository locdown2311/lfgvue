<template>
    <app-layout title="List Categories">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List Categories
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <div>
                        <InfoAlert/>
                    </div>
                    <div class="flex justify-center">
                        <span>Categories in our database</span>
                    </div>

                </div>
            </div>
        </div>
        <div class="py-5">
            <div class="sm:max-w-2xl md:max-w-5xl lg:max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="mt-3 bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                        <table class="table-fixed min-w-full">
                            <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">#</th>
                                <th class="px-4 py-2">Tipo</th>
                                <th class="px-4 py-2">Descrição</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr v-for="categoria in categorias.data" :key="categoria.id">
                                <td class="border px-4 py-2 text-center ">{{ categoria.id }}</td>
                                <td class="border px-4 py-2 text-center uppercase">{{ categoria.tipo }}</td>
                                <td class="border px-4 py-2 text-center">{{ categoria.descricao }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <Link :href="route('category.edit', { id: categoria.id })" class="btn btn-sm btn-outline btn-accent mr-1">
                                        Editar
                                    </Link>
                                    <button @click="deleteCat(categoria.id)" class="btn btn-sm btn-error">
                                        Deletar
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-end">
                            <jet-pagination class="m-5" :links="categorias.links" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import {Link} from "@inertiajs/inertia-vue3";
import JetPagination from "../../Components/Pagination";
import InfoAlert from "../../Components/InfoAlert";
import {Inertia} from "@inertiajs/inertia";
export default {
    name: "IndexCategory",
    components: {
        AppLayout,
        Link,
        JetPagination,
        InfoAlert
    },
    props:{
        categorias: Object
    },
    setup(props){
        const deleteCat = (catId) => {
            const result = confirm("Tem certeza?");
            if (result) {
                Inertia.delete(route("category.destroy", catId), {
                    preserveScroll: true,
                });
            }
        };
        return{deleteCat};
    }
}
</script>
