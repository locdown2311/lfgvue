<template>
    <app-layout :title="$t('activities_edit')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$t('activities_edit')}}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg px-4 py-4">
                    <jet-form-section @submitted="updatePost">
                        <template #title> {{$t('activities_edit_title')}} "{{atividade.slug}}" </template>
                        <template #description> {{$t('activities_edit_type')}}: {{ descricao }}</template>
                        <template #form>
                            <!-- Title -->
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="horario" :value="$t('activities_card_datetime')" />
                                <jet-input
                                    id="horario"
                                    type="datetime-local"
                                    class="mt-1 block w-full"
                                    v-model="form.horario"
                                    autocomplete="horario"
                                />
                                <jet-input-error :message="form.errors.horario" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="jogadores" :value="$t('activities_card_players')" />
                                <select id="qtdJogadores" v-model="form.qtd_jogadores">
                                    <option value="">{{$t('activities_create_modal_player_select')}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <jet-input-error :message="form.errors.qtd_jogadores" class="mt-2" />
                            </div>

                            <!-- Content -->
                            <div class="col-span-6 sm:col-span-4">
                                <jet-label for="observacoes" :value="$t('activities_create_modal_observation')" />
                                <textarea
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    v-model="form.observacao"
                                    rows="3"
                                ></textarea>
                                <jet-input-error :message="form.errors.observacao" class="mt-2" />
                            </div>
                        </template>

                        <template #actions>
                            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                                {{$t('activities_edit_saved')}}.
                            </jet-action-message>

                            <jet-button
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                {{$t('activities_create_modal_submit')}}
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
    name: "EditActivity",
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
        atividade: Object,
        descricao: String

    },
    setup(props){
        const form = useForm({
            _method: "PUT",
            horario: props.atividade.horario,
            qtd_jogadores: props.atividade.qtd_jogadores,
            observacao: props.atividade.observacao,
        });
        const updatePost = () => {
            form.put(route("activity.update", props.atividade), {
                preserveScroll: true,
            });
        };
        return { form, updatePost };
    },
}
</script>
