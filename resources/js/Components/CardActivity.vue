<template>
    <div class="card bordered border-gray-200 bg-white shadow-md">
        <figure>
            <img :src=getImage>
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
export default {
    name: "CardActivity",
    components:{
        Link, JetInput,JetLabel
    },
    props:['tipo','id','slug'],
    computed:{
        getImage(){
            switch(this.tipo) {
                case 'raid': {
                    return "https://d1lss44hh2trtw.cloudfront.net/assets/article/2020/10/21/destiny-2-beyond-light-raid-release-date_feature.jpg"
                    break;
                }
                case 'pvp': {
                    return "https://attackofthefanboy.com/wp-content/uploads/2015/02/destiny-crucible-aotf-760x428.jpg"
                    break;
                }
                case 'pve': {
                    return "https://www.windowscentral.com/sites/wpcentral.com/files/styles/xlarge/public/field/image/2021/07/glassway-grandmaster-nf-hero.jpg"
                    break;
                }
                default: {
                    return 'Algo deu errado'
                    break;
                }
            }
        }
    }
}
</script>
