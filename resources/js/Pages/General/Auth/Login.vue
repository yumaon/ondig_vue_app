<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import "../../../../css/animatedBackground.css";

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("general.login.store"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <Head title="General User Login" />
  <div class="animated-background text-white min-h-screen flex items-center justify-center">
    <div
      class="bg-white/10 backdrop-blur-md rounded-2xl shadow-lg p-8 border border-white/20 max-w-md w-full"
    >
      <h1 class="text-2xl font-bold mb-6 text-center">General User Login</h1>
      <form @submit.prevent="submit" class="space-y-6">
        <div>
          <InputLabel for="email" value="Email" />
          <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
            v-model="form.email"
            required
            autofocus
            autocomplete="username"
          />
          <InputError class="mt-2" :message="form.errors.email" />
        </div>

        <div>
          <InputLabel for="password" value="Password" />
          <TextInput
            id="password"
            type="password"
            class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
            v-model="form.password"
            required
            autocomplete="current-password"
          />
          <InputError class="mt-2" :message="form.errors.password" />
        </div>

        <div class="flex items-center justify-between">
          <label class="flex items-center">
            <Checkbox name="remember" v-model:checked="form.remember" />
            <span class="ml-2 text-sm text-gray-300">Remember me</span>
          </label>
          <Link :href="route('password.request')" class="text-sm text-gray-300 hover:text-white">
            Forgot your password?
          </Link>
        </div>

        <div>
          <PrimaryButton
            class="w-full bg-white/20 hover:bg-white/30 text-white"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Log in
          </PrimaryButton>
        </div>
      </form>
    </div>
  </div>
</template>
