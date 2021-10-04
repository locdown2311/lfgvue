<template>
    <Head title="Boas vindas" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700 underline">
                Dashboard
            </Link>

            <template v-else>
                <!-- Responsive Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Login
                        </jet-responsive-nav-link>
                        <jet-responsive-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Register
                        </jet-responsive-nav-link>
                    </div>
                </div>

            </template>
        </div>

        <div class="hero min-h-screen bg-base-200">
            <div class="text-center hero-content">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">
                        Boas vindas ao LFGDestiny
                    </h1>
                    <p class="mb-5">
                        Uma plataforma que irá facilitar suas atividades no Destiny.
                        Contamos com um sistema que facilita a identificação das atividades e as organiza da melhor forma ao utilizador.
                        Saia da solidão, jogos cooperativos são ideais para se jogar com outras pessoas. Junte-se a nós!
                    </p>
                    <div>
                        <div class="flex flex-row w-full">
                            <div class="grid flex-grow h-32 card place-items-center">
                                <a :href="route('register')" class="btn btn-primary">Cadastre-se</a>
                            </div>
                            <div class="divider divider-vertical">OU</div>
                            <div class="grid flex-grow h-32 card place-items-center">
                                <a :href="route('login')" class="btn btn-primary">Faça Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-500 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }
</style>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import ContainerCard from "../Components/ContainerCard";

    export default defineComponent({
        components: {
            Head,
            Link,
            ContainerCard
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    })
</script>
