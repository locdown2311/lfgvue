<template>
    <app-layout title="Edit Category">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Category
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <jet-form-section @submitted="editCategory">
                        <template #title> Update Category "{{categoria.descricao}}" </template>
                        <template #description> Of type: {{ categoria.tipo }}</template>
                        <template #form>
                            <!-- Title -->
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="tipo" value="Tipo" />
                                <select id="tipo" v-model="form.tipo" required>
                                    <option value="">Defina o tipo da categoria</option>
                                    <option value="pve">PVE</option>
                                    <option value="pvp">PVP</option>
                                    <option value="raid">RAID</option>
                                    <option value="diversos">DIVERSOS</option>
                                </select>
                                <jet-input-error :message="form.errors.horario" class="mt-2" />
                            </div>

                            <!-- Content -->
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="descricao" value="Descrição" />
                                <jet-input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    v-model="form.descricao"
                                ></jet-input>
                                <jet-input-error :message="form.errors.observacao" class="mt-2" />
                            </div>
                        </template>

                        <template #actions>
                            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                                Saved.
                            </jet-action-message>

                            <jet-button
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Save
                            </jet-button>
                        </template>
                    </jet-form-section>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import { useForm } from '@inertiajs/inertia-vue3'
import JetButton from "@/Jetstream/Button";
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetActionMessage from "@/Jetstream/ActionMessage";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetSelect from '../../Components/Select';
export default {
    name: "EditCategory",
    components: {
        AppLayout,
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        JetSelect,
    },
    props:{
        categoria: Object,
    },
    setup(props){
        const form = useForm({
            _method: "PUT",
            tipo: props.categoria.tipo,
            descricao: props.categoria.descricao,
        });
        const editCategory = () => {
            form.put(route("category.update", props.categoria), {
                preserveScroll: true,
            });
        };
        return { form, editCategory };
    },
}
</script>
