<template>
    <div>
        <div class="media mt-3" v-for="reply in replies.data">
            <a class="mr-3" href="#">
                <avatar
                    :username="reply.user.name"
                    class="mr-3"
                    :size="30"
                ></avatar>
            </a>
            <div class="media-body">
                <h6 class="mt-0">{{ reply.user.name }}</h6>
                <small>{{ reply.body }}</small>
            </div>
            <votes
                :initialvotes="reply.votes"
                :entityid="reply.id"
                :entityowner="reply.user.id"
            ></votes>
        </div>
        <div
            class="text-center"
            v-if="comment.repliesCount > 0 && replies.next_page_url"
        >
            <button class="btn btn-dark btn-sm mb-2" @click="getComments">
                More replies
            </button>
        </div>
    </div>
</template>

<script>
import Avatar from "vue-avatar";
export default {
    props: ["comment"],
    components: {
        Avatar
    },
    data() {
        return {
            replies: {
                data: [],
                next_page_url: `/comments/${this.comment.id}/replies`
            }
        };
    },

    methods: {
        getComments() {
            axios.get(this.replies.next_page_url).then(({ data }) => {
                this.replies = {
                    ...data,
                    data: [...this.replies.data, ...data.data]
                };
                /* console.log(data); */
            });
        },

        addReply(reply) {
            this.replies = {
                ...this.replies,
                data: [reply, ...this.replies.data]
            };
        }
    }
};
</script>
