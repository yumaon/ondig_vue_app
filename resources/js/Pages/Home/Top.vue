<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import "../../../css/animatedBackground.css";

defineProps({});

function handleImageError() {
  document.getElementById("screenshot-container")?.classList.add("!hidden");
  document.getElementById("docs-card")?.classList.add("!row-span-1");
  document.getElementById("docs-card-content")?.classList.add("!flex-row");
  document.getElementById("background")?.classList.add("!hidden");
}

const currentTab = ref("login");
const changeTab = (navName) => {
  currentTab.value = navName;
};
</script>

<template>
  <Head title="Welcome" />
  <div class="animated-background text-white">
    <div class="relative flex min-h-screen flex-col items-center justify-center">
      <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
        <header class="flex items-center justify-between py-10">
          <div class="flex items-center space-x-4">
            <svg
              class="h-12 w-auto text-white"
              viewBox="0 0 62 65"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <!-- SVG Path -->
            </svg>
            <span class="text-3xl font-extrabold">Ondig</span>
          </div>
        </header>

        <div class="bg-white/10 backdrop-blur-md rounded-2xl shadow-lg p-8 border border-white/20">
          <nav class="flex justify-center space-x-8 mb-8">
            <button
              @click="changeTab('login')"
              :class="{
                'border-b-4 border-white text-white': currentTab === 'login',
                'text-gray-300': currentTab !== 'login',
              }"
              class="px-6 py-3 transition focus:outline-none"
            >
              ログイン
            </button>
            <button
              @click="changeTab('register')"
              :class="{
                'border-b-4 border-white text-white': currentTab === 'register',
                'text-gray-300': currentTab !== 'register',
              }"
              class="px-6 py-3 transition focus:outline-none"
            >
              会員登録
            </button>
          </nav>

          <main>
            <transition name="fade" mode="out-in">
              <div v-if="currentTab === 'login'" class="flex flex-col items-center space-y-6">
                <Link
                  :href="route('general.login')"
                  class="rounded-full px-8 py-4 transition bg-white/20 hover:bg-white/30 text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white"
                >
                  GeneralUser Log in
                </Link>
                <Link
                  :href="route('artist.login')"
                  class="rounded-full px-8 py-4 transition bg-white/20 hover:bg-white/30 text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white"
                >
                  ArtistUser Log in
                </Link>
              </div>

              <div v-if="currentTab === 'register'" class="flex flex-col items-center space-y-6">
                <Link
                  :href="route('general.register')"
                  class="rounded-full px-8 py-4 transition bg-white/20 hover:bg-white/30 text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white"
                >
                  GeneralUser Register
                </Link>
                <Link
                  :href="route('artist.register')"
                  class="rounded-full px-8 py-4 transition bg-white/20 hover:bg-white/30 text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white"
                >
                  ArtistUser Register
                </Link>
              </div>
            </transition>
          </main>
        </div>

        <footer class="py-16 text-center text-sm text-white/70">
          © 2025 Ondig. All rights reserved.
        </footer>
      </div>
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
