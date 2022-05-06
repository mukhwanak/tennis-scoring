<template>
    <Head title="Create User"/>

    <h1 class="text-3xl">Get Results</h1>

    <form @submit.prevent="submit()" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="player1"> Player 1 </label>

            <input v-model="form.player1" class="border border-gray-400 p-2 w-full" type="text" name="player1"
                   id="player1" required/>
            <div v-if="form.errors.player1" v-text="form.errors.player1" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="player2"> Player 2 </label>

            <input v-model="form.player2" class="border border-gray-400 p-2 w-full" type="text" name="player2"
                   id="player2" required/>
            <div v-if="form.errors.player2" v-text="form.errors.player2" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    :disabled="form.processing">Games Results
            </button>
        </div>
    </form>

    <div class="flex flex-col">


        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <h4 v-if="final_results">Score</h4>
                            <h2>{{ final_results }}</h2>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
// // import {ref} from "vue";

let form = useForm({
    player1: null,
    player2: null,
}, {
    key: 'login',
    remember: false,
});

let props = defineProps({
    final_results: String,
});

let submit = () => {
    console.log("post action");
    form.post('/results');
};

</script>
