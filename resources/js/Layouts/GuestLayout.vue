<template>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-sky-600"
    >
        <div class="absolute flex mb-80 w-44 h-auto">
            <img
                class="bg-white bg-cover border-4 p-2 border-gray-600 rounded-2xl text-center"
                src="../../assets/sendIU.png"
                alt=""
            />
        </div>
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
