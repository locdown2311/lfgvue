<template>
    <div class="card bordered border-gray-200 bg-white shadow-md">
        <figure>

            <Icon v-if="tipo === 'pvp'" icon="mdi:bow-arrow" width="135" height="135"></Icon>
            <Icon v-else-if="tipo === 'pve'" icon="akar-icons:people-group" width="135" height="135"></Icon>
            <Icon v-else-if="tipo === 'raid'" icon="healthicons:group-discussion-meeting-outline" width="135" height="135"></Icon>
            <Icon v-else icon="ant-design:question-circle-outlined" width="135" height="135"></Icon>
        </figure>
        <div class="card-body">
            <h2 class="card-title">
                <slot name="descricao"></slot>
                <div class="badge mx-2 badge-secondary uppercase">
                    {{tipo}}
                </div>
            </h2>
            <p><slot name="observacao"></slot></p>
            <div class="divider"></div>
            <span class="text-sm font-semibold">{{ $t('activities_card_players') }} :
                <slot name="jogadores"></slot> </span>
            <p>
                <i class="far fa-clock fa-fw mr-2 text-gray-900"></i>{{ $t('activities_card_datetime') }} :
                <slot name="horario"></slot>
            </p>
            <p>
                <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i>{{ $t('activities_card_createdby') }} :
                <slot name="usuario"></slot>
            </p>
            <div class="divider"></div>
              <jet-label for="link">Link</jet-label>
                <jet-input
                    id="link"
                    type="text"
                    class="mt-1 block w-full text-sm"
                    :value="route('activity.show', { slug: this.slug })"
                />

            <div class="justify-end card-actions">
                <Link :class="$page.props.permission.activity.join ? 'btn btn-outline btn-accent' : 'btn btn-disabled'" :href="route('activity.show', { slug: this.slug })">
                    <span><i class="fas fa-info-circle"></i> {{ $t('activities_card_moreinfo') }} </span>
                </Link>
            </div>
        </div>
    </div>

</template>

<script>
import JetLabel from '../Jetstream/Label';
import JetInput from '../Jetstream/Input';
import {Link} from '@inertiajs/inertia-vue3';
import { Icon } from '@iconify/vue';
export default {
    name: "CardActivity",
    components:{
        Link, JetInput,JetLabel,Icon
    },
    props:['tipo','id','slug'],
    computed:{
        getImage(){
            switch(this.tipo) {
                case 'raid': {
                    return "healthicons:group-discussion-meeting-outline"
                    break;
                }
                case 'pvp': {
                    return "mdi:bow-arrow"
                    break;
                }
                case 'pve': {
                    return "akar-icons:people-group"
                    break;
                }
                default: {
                    return 'ant-design:question-circle-outlined'
                    break;
                }
            }
        }
    }
}
</script>
