import Vue from 'vue';

/**
 * Export a new Vue instance to be used as a global event bus
 * @type {Vue}
 */
const Event = new Vue({
    name: 'Events',
});

export default Event;
