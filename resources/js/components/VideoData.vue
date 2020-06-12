<template>
    <div>
        <video-player :options="videoOptions" />
    </div>
</template>

<script>
import VideoPlayer from "./VideoPlayer";

export default {
    props: ["videodata"],
    name: "VideoExample",
    components: {
        VideoPlayer
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

    computed: {
        videoData() {
            return this.videodata;
        }
    }
};
</script>
