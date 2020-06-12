<template>
    <div>
        <video ref="videoPlayer" class="video-js"></video>
    </div>
</template>

<script>
import videojs from "video.js";
export default {
    name: "VideoPlayer",
    props: ["options"],
    data() {
        return {
            player: null
        };
    },

    mounted() {
        this.player = videojs(
            this.$refs.videoPlayer,
            this.options
            /* function onPlayerReady() {
                console.log("onPlayerReady", this);
            } */
        );

        let viewsLog = false;

        this.player.on("timeupdate", () => {
            let percentageplayed = Math.ceil(
                (this.player.currentTime() / this.player.duration()) * 100
            );

            if (percentageplayed > 5 && !viewsLog) {
                axios.put("/video/" + window.currentvideo).then(res => {
                    console.log(res);
                });

                viewsLog = true;
            }
        });
    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose();
        }
    },
    computed: {}
};
</script>
