<template>
    <div class="card bordered bg-white">
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
            <span class="text-sm font-semibold">Jogadores necessários:
                <slot name="jogadores"></slot> </span>
            <p>
                <i class="far fa-clock fa-fw mr-2 text-gray-900"></i>Horário previsto:
                <slot name="horario"></slot>
            </p>
            <p>
                <i class="far fa-address-card fa-fw text-gray-900 mr-2"></i>Criado por:
                <slot name="usuario"></slot>
            </p>
            <div class="divider"></div>
            <div class="form-control">
                <!--<p><i class="fas fa-paperclip"></i> <input type="text" class="input input-bordered w-full" readonly :value="route('view.activity',['slug' => conferir])"></p>
            !--></div>
            <div class="justify-end card-actions">
                <Link class="btn btn-outline btn-accent" :href="route('activity.show', { slug: this.slug })">
                    <span><i class="fas fa-info-circle"></i> Mais informações</span>
                </Link>
            </div>
        </div>
    </div>

</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    name: "CardActivity",
    components:{
        Link
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

<style scoped>

</style>
