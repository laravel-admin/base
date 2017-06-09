<template>
    <div v-if="visible" :class="alertType" class="alert alert--active">
        <div class="container">
            {{ message }}
        </div>
    </div>
</template>

<script>
import Event from '../Event';

export default {
    name: 'notification',

    data() {
        return {
            message: null,
            type: 'success',
        };
    },

    methods: {
        updateNotification(data) {
            this.type = data.type;
            this.message = data.message;
        },
    },

    mounted() {
        Event.$on('notification', this.updateNotification);
    },

    computed: {
        visible() { return this.message && this.type },
        alertType() { return `alert-${this.type}` },
    },
}
</script>
