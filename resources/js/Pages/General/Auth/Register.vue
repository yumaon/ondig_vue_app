<script setup>
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import "../../../../css/animatedBackground.css";

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

const currentStep = ref(1);

const nextStep = () => {
  if (nextGoIsPossibleTo()) {
    currentStep.value++;
  }
};

const backStep = () => {
  if (currentStep.value != 1) {
    currentStep.value--;
  }
};

const nextGoIsPossibleTo = () => {
  if (currentStep.value === 1) {
    if (
      form.name === "" ||
      form.email === "" ||
      form.password === "" ||
      form.password_confirmation === ""
    ) {
      return false;
    }
  }
  return true;
};

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
  <Head title="General User Register" />
  <div class="animated-background text-white min-h-screen flex items-center justify-center">
    <div
      class="bg-white/10 backdrop-blur-md rounded-2xl shadow-lg p-8 border border-white/20 max-w-md w-full"
    >
      <h1 class="text-2xl font-bold mb-6 text-center">General User Register</h1>
      <form @submit.prevent="submit" class="space-y-6">
        <transition name="fade" mode="out-in">
          <div v-if="currentStep === 1">
            <div>
              <InputLabel for="name" value="Name" />
              <TextInput
                id="name"
                type="text"
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
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
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
                v-model="form.email"
                required
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
                autocomplete="new-password"
              />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div>
              <InputLabel for="password_confirmation" value="Confirm Password" />
              <TextInput
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
              />
              <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex justify-end mt-4">
              <PrimaryButton
                @click.prevent="nextStep"
                class="bg-white/20 text-white"
                :class="{
                  'hover:bg-white/30': nextGoIsPossibleTo(),
                  'hover:bg-white/20': !nextGoIsPossibleTo(),
                }"
                :disabled="!nextGoIsPossibleTo()"
              >
                次へ
              </PrimaryButton>
            </div>
          </div>

          <div v-if="currentStep === 2">
            <p class="text-sm text-gray-300 mb-4 text-center">
              こちらの設定項目はスキップ可能です。<br />
              現時点で設定しない場合は次へを押してください。
            </p>
            <div>
              <InputLabel for="prefecture" value="Prefecture" />
              <select
                id="prefecture"
                v-model="form.prefecture_id"
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
              >
                <option value="">選択してください</option>
                <option v-for="pref in prefectures" :key="pref.id" :value="pref.id">
                  {{ pref.name }}
                </option>
              </select>
              <InputError class="mt-2" :message="form.errors.prefecture_id" />
            </div>

            <div>
              <InputLabel for="city_name" value="City" />
              <TextInput
                id="city_name"
                type="text"
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
                v-model="form.city_name"
                placeholder="例: 東京都渋谷区"
                :disabled="form.prefecture_id == ''"
              />
              <InputError class="mt-2" :message="form.errors.city_name" />
            </div>

            <div>
              <InputLabel for="address_detail" value="Address Detail" />
              <TextInput
                id="address_detail"
                type="text"
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
                v-model="form.address_detail"
                placeholder="例: 1丁目2番地3号"
                :disabled="form.prefecture_id == ''"
              />
              <InputError class="mt-2" :message="form.errors.address_detail" />
            </div>

            <div class="flex justify-between mt-4">
              <PrimaryButton
                @click.prevent="backStep"
                class="bg-white/20 hover:bg-white/30 text-white"
              >
                戻る
              </PrimaryButton>
              <PrimaryButton
                @click.prevent="nextStep"
                class="bg-white/20 hover:bg-white/30 text-white"
              >
                次へ
              </PrimaryButton>
            </div>
          </div>

          <div v-if="currentStep === 3">
            <p class="text-sm text-gray-300 mb-4 text-center">
              こちらの設定項目はスキップ可能です。<br />
              現時点で設定しない場合は登録ボタンを押してください。
            </p>
            <div>
              <InputLabel for="introduction" value="Introduction" />
              <textarea
                id="introduction"
                v-model="form.introduction"
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
                rows="3"
              ></textarea>
              <InputError class="mt-2" :message="form.errors.introduction" />
            </div>

            <div>
              <InputLabel for="profile_image" value="Profile Image" />
              <input
                type="file"
                id="profile_image"
                @input="form.profile_image = $event.target.files[0]"
                class="mt-1 block w-full bg-white/20 text-white placeholder-gray-300"
                accept="image/*"
              />
              <InputError class="mt-2" :message="form.errors.profile_image" />
            </div>

            <div class="flex justify-between mt-4">
              <PrimaryButton
                @click.prevent="backStep"
                class="bg-white/20 hover:bg-white/30 text-white"
              >
                戻る
              </PrimaryButton>
              <PrimaryButton
                class="bg-white/20 hover:bg-white/30 text-white"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
              >
                Register
              </PrimaryButton>
            </div>
          </div>
        </transition>
      </form>
    </div>
  </div>
</template>
<style>
/* フェードイン用 */
.fade-enter-from {
  opacity: 0;
}
.fade-enter-active {
  transition: opacity 0.3s ease;
}
.fade-enter-to {
  opacity: 1;
}

/* フェードアウト用 */
.fade-leave-from {
  opacity: 1;
}
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-leave-to {
  opacity: 0;
}
</style>
