<template>
    <div class="mt-3 bg-white overflow-x-auto shadow-xl sm:rounded-lg px-4 py-4">
        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 w-20">#</th>
                <th class="px-4 py-2">Atv</th>
                <th class="px-4 py-2">Horário</th>
                <th class="px-4 py-2 w-20">Qtd</th>
                <th class="px-4 py-2 w-30">Obs</th>
                <th class="px-4 py-2 w-50">Ações</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="atividade in atividades.data" :key="atividade.id">
                    <td class="border px-4 py-2 text-center">{{ atividade.id }}</td>
                    <td class="border px-4 py-2 text-center">{{ atividade.category.descricao }}</td>
                    <td class="border px-4 py-2 text-center">{{ atividade.horario }}</td>
                    <td class="border px-4 py-2 text-center">{{ atividade.qtd_jogadores }}</td>
                    <td class="border px-4 py-2 text-center truncate ...">{{ atividade.observacao }}</td>
                    <td class="border px-4 py-2 text-center">
                        <Link :href="route('activity.edit', { id: atividade.id })" class="btn btn-sm btn-outline btn-accent mr-1">
                            {{ $t('edit') }}
                        </Link>
                        <button @click="deleteAct(atividade.id)" class="btn btn-sm btn-error">
                            {{ $t('delete')}}
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end">
            <jet-pagination class="m-5" :links="atividades.links" />
        </div>

    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import JetPagination from "../../Components/Pagination";
import { Inertia } from '@inertiajs/inertia'

export default {
    name: "ListUserActivity",
    props:['atividades'],
    components:{
        Link,
        JetPagination,
    },
    setup(props){
        const deleteAct = (actId) => {
            const result = confirm("Tem certeza?");
            if (result) {
                Inertia.delete(route("activity.destroy", actId), {
                    preserveScroll: true,
                });
            }
        };
        return {deleteAct};
    }
}
</script>
