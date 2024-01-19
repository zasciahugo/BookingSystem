<template>
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-slate-100 to-slate-300 px-4 lg:px-0">
        <div>
            <slot name="logo" />
        </div>

        <div
            class="w-full max-w-md mt-8 px-8 py-8 bg-white border border-slate-200 shadow-sm overflow-hidden rounded-lg">
            <slot />
        </div>
    </div>
</template>