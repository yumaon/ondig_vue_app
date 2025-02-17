<script setup>
import { Head } from "@inertiajs/vue3";
import "../../../css/animatedBackground.css";
</script>
<template>
  <div
    class="animated-background text-white min-h-screen flex flex-col justify-center items-center py-12 px-6"
  >
    <!-- ABOUT タイトル -->
    <div class="text-center mb-8 mt-4">
      <h1 class="text-3xl font-bold border-b-2 inline-block pb-2">ABOUT</h1>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center">
      <!-- テキストコンテンツ -->
      <div class="md:w-1/3 text-center md:text-left px-6">
        <h1 class="text-6xl font-extrabold">Ondig</h1>
        <h4 class="mt-4 text-lg font-bold">お気に入りのArtistを探そう。</h4>
        <h4 class="text-lg font-bold">Artist活動を発信しよう。</h4>
        <p class="mt-6 leading-relaxed text-gray-300">
          Ondigでは、まだ自分が認知していないArtistを探したり、また、音楽活動をしている方々はArtistとして情報を発信することができます。<br /><br />
          Artist会員の方はTopicsの投稿ができ、他にもプロフィールページの設定や、プロフィールページにてLiveのスケジュール、物販物の登録ができます。<br /><br />
          会員登録をすることにより、Artistをフォローすることができるようになります。フォローをすることによって、そのArtistとメッセージのやり取りが可能です。ファンやイベンターの方、またはArtist間で繋がることで、何かの新しい”きっかけ”になればと考えています。
        </p>
      </div>

      <!-- 画像の配置 -->
      <div class="md:w-2/3 grid grid-cols-2 gap-4 mt-8 md:mt-0">
        <div
          v-for="index in 4"
          :key="index"
          class="w-full h-40 bg-gray-700 rounded-lg flex items-center justify-center"
        >
          <img
            :src="`/path/to/image${index}.jpg`"
            alt="Image"
            class="w-full h-full object-cover rounded-lg"
          />
        </div>
      </div>
    </div>

    <!-- フッター -->
    <div class="text-center mt-12 text-gray-400 text-sm">Ondig</div>
  </div>
</template>
