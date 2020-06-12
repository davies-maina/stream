<template>
    <div>
        <video-player :options="videoOptions" />
    </div>
</template>

<script>
import VideoPlayer from "./VideoPlayer";
import videojs from "video.js";

export default {
    props: ["videodata"],
    name: "VideoExample",
    components: {
        VideoPlayer
    },
    created() {
        this.videoData;
    },

    data() {
        return {
            videoOptions: {
                autoplay: true,
                controls: true,
                sources: [
                    {
                        src: this.videodata,
                        type: "application/x-mpegURL"
                    }
                ]
            }
        };
    },

    computed: {}
};
</script>
