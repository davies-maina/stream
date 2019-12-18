<template>
    <div class="text-center">
                        <button class="btn btn-dark" @click="toggleSubscription">{{owner?'' :subscribed ?'Unsubscribe':'Subscribe'}} {{subscriptions.length}} {{owner?'subscribers': ''}} </button>
                    </div>
</template>
<script>
export default {
    props:['subscriptions', 'channel'],

    methods: {
        toggleSubscription(){

            if(!__auth() || this.channel.user_id===__auth().id){

                alert('log in')
            }
        }
    },

    computed: {
        subscribed(){

            if (!__auth()) return false;

            return !!this.subscriptions.find(subscription=>subscription.user_id===__auth().id);
        },

        owner(){

            if (__auth() && this.channel.user_id===__auth().id) return true;

            return false;
        }
    },
}
</script>