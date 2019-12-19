<template>
    <div class="text-center">
                        <button class="btn btn-dark" @click="toggleSubscription">{{owner?'' :subscribed ?'Unsubscribe':'Subscribe'}} {{subCount}} {{owner?'subscribers': ''}} </button>
                    </div>
</template>
<script>
import numeral from 'numeral'
export default {
    props:['initialsubscriptions', 'channel'],

    data() {
        return {
            subscriptions:this.initialsubscriptions
        }
    },

    methods: {
        toggleSubscription(){

            if(!__auth() || this.channel.user_id===!__auth().id){

                alert('log in')
            }

            if (this.owner) {
                alert('you cant subscribe to your channel')
            }

            if (this.subscribed) {
                axios.delete(`/channels/${this.channel.id}/subscriptions/${this.subscription.id}`)
                    .then(()=>{

                        this.subscriptions=this.subscriptions.filter(s=>s.id !==this.subscription.id)
                    })
                    
            }

            else {

                axios.post(`/channels/${this.channel.id}/subscriptions`)
                    .then((res)=>{

                        this.subscriptions=[

                            ...this.subscriptions,
                            res.data
                        ]
                    })
            }
        }
    },

    computed: {
        subscribed(){

            if (!__auth()) return false;

            return !!this.subscription;
        },

        owner(){

            if (__auth() && this.channel.user_id===__auth().id) return true;

            return false;
        },

        subCount(){

            return numeral(this.subscriptions.length).format('0a')
        },

        subscription(){

            if(!__auth()) return null;

           return this.subscriptions.find(subscription=>subscription.user_id===__auth().id);
        }
    },
}
</script>