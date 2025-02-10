<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
  prefectures: {
    type: Array,
    required: true,
  },
});

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
  prefecture_id: "",
  city_name: "",
  address_detail: "",
  latitude: null,
  longitude: null,
  introduction: "",
  profile_image: null,
});

// const submit = () => {
//   try {
//     form.post(route("register"), {
//       onFinish: () => form.reset("password", "password_confirmation"),
//     });
//   } catch (error) {
//     console.log(error);
//   }
// };

const submit = () => {
  console.log("Form submitted:", form.data()); // デバッグ用

  form.post(route("general.register.store"), {
    onSuccess: () => {
      console.log("Success!");
    },
    onError: (errors) => {
      console.log("Errors:", errors);
    },
    onFinish: () => {
      console.log("Finished");
      form.reset("password", "password_confirmation");
    },
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="会員登録" />

    <form @submit.prevent="submit">
      <div>
        <InputLabel for="name" value="お名前" />
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

      <div class="mt-4">
        <InputLabel for="email" value="メールアドレス" />
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

      <div class="mt-4">
        <InputLabel for="prefecture" value="都道府県" />
        <select
          id="prefecture"
          v-model="form.prefecture_id"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
          required
        >
          <option value="">選択してください</option>
          <option v-for="pref in prefectures" :key="pref.id" :value="pref.id">
            {{ pref.name }}
          </option>
        </select>
        <InputError class="mt-2" :message="form.errors.prefecture_id" />
      </div>

      <div class="mt-4">
        <InputLabel for="city_name" value="市区町村" />
        <TextInput
          id="city_name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.city_name"
          required
          placeholder="例：渋谷区"
        />
        <InputError class="mt-2" :message="form.errors.city_name" />
      </div>

      <div class="mt-4">
        <InputLabel for="address_detail" value="番地など" />
        <TextInput
          id="address_detail"
          type="text"
          class="mt-1 block w-full"
          v-model="form.address_detail"
          placeholder="例：1-2-3"
        />
        <InputError class="mt-2" :message="form.errors.address_detail" />
      </div>

      <div class="mt-4">
        <InputLabel for="introduction" value="自己紹介" />
        <textarea
          id="introduction"
          v-model="form.introduction"
          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
          rows="3"
        ></textarea>
        <InputError class="mt-2" :message="form.errors.introduction" />
      </div>

      <div class="mt-4">
        <InputLabel for="profile_image" value="プロフィール画像" />
        <input
          type="file"
          id="profile_image"
          @input="form.profile_image = $event.target.files[0]"
          class="mt-1 block w-full"
          accept="image/*"
        />
        <InputError class="mt-2" :message="form.errors.profile_image" />
      </div>

      <div class="mt-4">
        <InputLabel for="password" value="パスワード" />
        <TextInput
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          required
          autocomplete="new-password"
        />
        <InputError class="mt-2" :message="form.errors.password" />
      </div>

      <div class="mt-4">
        <InputLabel for="password_confirmation" value="パスワード（確認）" />
        <TextInput
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          required
          autocomplete="new-password"
        />
        <InputError class="mt-2" :message="form.errors.password_confirmation" />
      </div>

      <div class="mt-4 flex items-center justify-end">
        <Link
          :href="route('general.login')"
          class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >
          すでにアカウントをお持ちの方
        </Link>

        <PrimaryButton
          class="ms-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          登録する
        </PrimaryButton>
      </div>
    </form>
  </GuestLayout>
</template>
