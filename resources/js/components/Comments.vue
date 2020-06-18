<template>
    <div class="card mt-5 p-5">
        <div class="form-inline my-4 w-full" v-if="isAuth">
            <input
                type="text"
                v-model="newcomment"
                class="form-control form-control-sm w-80"
            />
            <button class="btn btn-sm btn-primary">
                <small @click="addComment">Add comment</small>
            </button>
        </div>

        <comment
            v-for="comment in comments.data"
            :key="comment.id"
            :comment="comment"
        ></comment>

        <div class="text-center">
            <button
                v-if="comments.next_page_url"
                @click="getComments"
                class="btn btn-success"
            >
                More comments
            </button>
            <span v-else>No more comments to show :)</span>
        </div>
    </div>
</template>

<script>
/* import Avatar from "vue-avatar"; */

import votes from "./Vote";
import comment from "./Comment";
export default {
    props: ["video"],
    components: {
        /* Avatar, */

        votes,
        comment
    },
    mounted() {
        this.getComments();
    },
    data: () => ({
        comments: {
            data: []
        },
        newcomment: ""
    }),
    methods: {
        getComments() {
            const url = this.comments.next_page_url
                ? this.comments.next_page_url
                : `/videos/${this.video.id}/comments`;
            axios.get(url).then(({ data }) => {
                this.comments = {
                    ...data,
                    data: [...this.comments.data, ...data.data]
                };
                /* console.log(data); */
            });
        },

        addComment() {
            if (!this.newcomment) return;

            axios
                .post(`/comments/${this.video.id}`, {
                    body: this.newcomment
                })
                .then(({ data }) => {
                    this.comments = {
                        ...this.comments, //spread all current comments
                        data: [
                            data, //new comment from server
                            ...this.comments.data
                        ]
                    };
                });
        }
    },

    computed: {
        isAuth() {
            return __auth();
        }
    }
};
</script>
