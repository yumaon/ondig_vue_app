<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { useAnimate } from "@vueuse/core";
import { ref, onMounted } from "vue";

const el = ref(null);
const { animate } = useAnimate(
  el,
  {
    opacity: [0, 1],
    transform: ["translateY(20px)", "translateY(0)"],
  },
  {
    duration: 1000,
    delay: 100,
    easing: "ease-out",
  }
);

onMounted(() => {
  animate();
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div ref="el" class="p-6 text-gray-900">こんにちは！</div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
