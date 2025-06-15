<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {ref} from "vue";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    avatar: null
});

const previewUrl = ref(null)
const file = ref(null);

const handleFileChange = (event) => {
    const selectedFile = event.target.files[0];
    if (selectedFile && selectedFile.type.startsWith('image/')) {
        file.value = selectedFile;
        previewUrl.value = URL.createObjectURL(selectedFile);
        form.avatar = selectedFile;
        console.log(form.avatar);
    } else {
        file.value = null;
        previewUrl.value = null;
        alert('Выберите изображение.');
    }
};

</script>

<template>
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900">
                    Основная информация
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    Обновите информацию профиля вашей учетной записи и адрес электронной почты.
                </p>
            </header>

            <form
                @submit.prevent="form.post(route('profile.update'), {forceFormData: true})"
                class="mt-6 space-y-6"
            >
                <div>
                    <InputLabel for="name" value="Имя" />

                    <TextInput
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="email" value="Email" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div v-if="mustVerifyEmail && user.email_verified_at === null">
                    <p class="mt-2 text-sm text-gray-800">
                        Your email address is unverified.
                        <Link
                            :href="route('verification.send')"
                            method="post"
                            as="button"
                            class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        >
                            Click here to re-send the verification email.
                        </Link>
                    </p>

                    <div
                        v-show="status === 'verification-link-sent'"
                        class="mt-2 text-sm font-medium text-green-600"
                    >
                        A new verification link has been sent to your email address.
                    </div>
                </div>
                <div class="flex items-center">
                    <label class="cursor-pointer inline-block relative">
                        <img
                            :src="previewUrl  || `/storage/${user.avatar}`"
                            alt="Аватар"
                            class="w-[80px] h-[80px] rounded-full object-cover border border-black"
                        />
                        <input
                            type="file"
                            class="hidden"
                            name="avatar"
                            accept="image/*"
                            @change="handleFileChange"
                        />
                    </label>
                    <span class="ml-[20px] text-gray-700 text-sm">Вы можете обновить аватар</span>
                </div>
                <div class="flex justify-center items-center gap-4">
                    <SecondaryButton :disabled="form.processing">Обновить</SecondaryButton>

                    <Transition
                        enter-active-class="transition ease-in-out"
                        enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out"
                        leave-to-class="opacity-0"
                    >
                        <p
                            v-if="form.recentlySuccessful"
                            class="text-sm text-gray-600"
                        >
                            Сохранено.
                        </p>
                    </Transition>
                </div>
            </form>

        </section>
</template>
