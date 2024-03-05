<template>
    <div class="flex flex-col text-center">
      <div class="w-full bg-[#186434] rounded-md text-white flex-row">
        <p class="font-medium">Head</p>
      </div>
      <div class="flex flex-row justify-center p-3">
        <div class="relative" @click="addMark($event, 'head')">
          <img src="/images/medical.png" alt="head image" class="w-64 h-auto">
          <template v-for="(mark, index) in marks.head" :key="index">
            <div :style="{ top: mark.y + 'px', left: mark.x + 'px', width: mark.size + 'px', height: mark.size + 'px' }" class="absolute rounded-full glowing-circle"></div>
          </template>
        </div>
  
        <div class="flex flex-col justify-center gap-3 ml-20">
          <p class="text-blue-700 text-xs font-semibold italic">Tap on head to put mark/s</p>
          <input type="range" v-model="headSliderValue" min="5" max="50" step="1">
          <button @click="saveMarks('head')" type="button" class="bg-yellow-300 text-white p-2 rounded w-14 h-9">Save</button>
          <button @click="resetMarks('head')" type="button" class="bg-red-500 text-white p-2 rounded w-14 h-9">Reset</button>
        </div>
      </div>
    </div>
  
    <div class="flex flex-row justify-center items-center p-3">
      <div @click="addMark($event, 'body')" class="relative">
        <img src="/images/bodymed.png" alt="body image" class="w-80 h-auto">
        <template v-for="(mark, index) in marks.body" :key="index">
          <div :style="{ position: 'absolute', top: mark.y + 'px', left: mark.x + 'px', width: mark.size + 'px', height: mark.size + 'px' }" class="rounded-full glowing-circle"></div>
        </template>
      </div>
      <div class="flex flex-col justify-center gap-3 ml-6">
        <p class="text-blue-700 text-xs font-semibold italic">Tap on body to put mark/s</p>
        <input type="range" v-model="bodySliderValue" min="5" max="50" step="1">
        <button @click="saveMarks('body')" type="button" class="bg-yellow-300 text-white p-2 rounded w-14 h-9">Save</button>
        <button @click="resetMarks('body')" type="button" class="bg-red-500 text-white p-2 rounded w-14 h-9">Reset</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        marks: {
          head: [],
          body: []
        },
        headSliderValue: 20, // Initial slider value for head
        bodySliderValue: 20 // Initial slider value for body
      };
    },
    methods: {
      addMark(event, area) {
        const x = event.offsetX;
        const y = event.offsetY;
        const size = area === 'head' ? this.headSliderValue : this.bodySliderValue;
        this.marks[area].push({ x, y, size });
      },
      saveMarks(area) {
        // Your logic to save marks based on the area
      },
      resetMarks(area) {
        this.marks[area] = [];
      }
    }
  };
  </script>
  
  <style scoped>
  .glowing-circle {
    animation: glow 1.5s infinite alternate;
  }
  
  @keyframes glow {
    0% {
      box-shadow: 0 0 10px 0px rgba(255, 0, 0, 0.5);
    }
    100% {
      box-shadow: 0 0 20px 10px rgba(255, 0, 0, 0.5);
    }
  }
  </style>
  