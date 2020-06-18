<template>
    <div class="media my-3">
        <avatar :username="comment.user.name" class="mr-3" :size="30"></avatar>

        <div class="media-body">
            <h6 class="mt-0">
                {{ comment.user.name }}
            </h6>
            <small>
                {{ comment.body }}
            </small>
            <div class="d-flex">
                <votes
                    :initialvotes="comment.votes"
                    :entityid="comment.id"
                    :entityowner="comment.user.id"
                ></votes>
                <button
                    class="btn btn-sm default ml-2"
                    @click="addingRep = !addingRep"
                >
                    {{ addingRep ? "cancel" : "Add reply" }}
                </button>
            </div>
            <div class="form-inline my-4 w-full" v-if="addingRep">
                <input type="text" class="form-control form-control-sm w-80" />
                <button
                    class="btn btn-sm "
                    :class="{
                        'btn-default': !addingRep,
                        'btn-primary': addingRep
                    }"
                >
                    <small>Add reply</small>
                </button>
            </div>

            <replies :comment="comment"></replies>
        </div>
    </div>
</template>

<script>
import replies from "./Replies";
import Avatar from "vue-avatar";
export default {
    props: ["comment"],
    components: {
        replies,
        Avatar
    },
    data() {
        return {
            addingRep: false
        };
    }
};
</script>
