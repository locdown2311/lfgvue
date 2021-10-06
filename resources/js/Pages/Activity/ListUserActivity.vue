<template>
    <div class="mt-3 bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 w-20">#</th>
                <th class="px-4 py-2">Atividade</th>
                <th class="px-4 py-2">Horário</th>
                <th class="px-4 py-2">Qtd Jogadores</th>
                <th class="px-4 py-2">Observações</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="atividade in atividades.data" :key="atividade.id">
                    <td class="border px-4 py-2 text-center">{{ atividade.id }}</td>
                    <td class="border px-4 py-2 text-center">{{ atividade.category.descricao }}</td>
                    <td class="border px-4 py-2 text-center">{{ atividade.horario }}</td>
                    <td class="border px-4 py-2 text-center">{{ atividade.qtd_jogadores }}</td>
                    <td class="border px-4 py-2 text-center">{{ atividade.observacao }}</td>
                    <td class="border px-4 py-2 text-center">
                        <Link :href="route('activity.edit', { id: atividade.id })" class="btn btn-outline btn-accent">
                            Editar
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <jet-pagination class="m-5" :links="atividades.links" />
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
import JetPagination from "../../Components/Pagination";
export default {
    name: "ListUserActivity",
    props:['atividades'],
    components:{
        Link,
        JetPagination,
    }
}
</script>
