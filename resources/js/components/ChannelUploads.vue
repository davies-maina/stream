<template>
    <div class="col-md-8">
        <div
            class="card p-3 d-flex align-items-center justify-content-lg-center"
            v-if="!selected"
        >
            <input
                type="file"
                multiple
                ref="videos"
                id="videoFiles"
                style="display:none;"
                @change="uploadVideo"
            />

            <p class="text-center">Upload video(S)</p>
            <img
                src="https://img.icons8.com/dotty/80/000000/upload-to-ftp.png"
                onclick="document.getElementById('videoFiles').click()"
            />
        </div>
        <div class="card p-3" v-else>
            <div class="my-4" v-for="video in videos" :key="video.title">
                <div class="progress mb-3">
                    <div
                        class="progress-bar progress-bar-striped progress-bar-animated "
                        role="progressbar"
                        :style="{
                            width: `${video.percentage ||
                                progress[video.name]}%`
                        }"
                        aria-valuenow="50"
                        aria-valuemin="0"
                        aria-valuemax="100"
                    >
                        {{
                            video.percentage
                                ? video.percentage === 100
                                    ? "processing complete"
                                    : "Processing"
                                : "uploading"
                        }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div
                            class="d-flex justify-content-center align-items-center"
                            style="height: 180px; color: white; font-size: 18px; background: #808080;"
                            v-if="!video.thumbnail"
                        >
                            Loading thumbnail ...
                        </div>

                        <img
                            v-else
                            :src="video.thumbnail"
                            style="width:100%;"
                            alt="Video thumbnail"
                        />
                    </div>

                    <div class="col-md-4">
                        <a
                            :href="`/videos/${video.id}`"
                            target="_blank"
                            v-if="video.percentage && video.percentage === 100"
                            >{{ video.title }}</a
                        >
                        <h4 class="text-center" v-else>
                            {{ video.title || video.name }}
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["channel"],
    data() {
        return {
            selected: false,
            videos: [],

            progress: {},

            uploads: [],
            intervals: {}
        };
    },

    methods: {
        uploadVideo() {
            this.selected = true;
            this.videos = Array.from(this.$refs.videos.files);

            const uploaders = this.videos.map(video => {
                const form = new FormData();

                this.progress[video.name] = 0;

                form.append("video", video);
                form.append("title", video.name);

                return axios
                    .post(`/channels/${this.channel.id}/videos`, form, {
                        onUploadProgress: event => {
                            this.progress[video.name] = Math.ceil(
                                (event.loaded / event.total) * 100
                            );

                            this.$forceUpdate();
                        }
                    })
                    .then(({ data }) => {
                        this.uploads = [...this.uploads, data];
                    });
            });

            axios.all(uploaders).then(() => {
                this.videos = this.uploads;

                this.videos.forEach(video => {
                    this.intervals[video.id] = setInterval(() => {
                        axios.get(`/videos/${video.id}`).then(({ data }) => {
                            if (data.percentage === 100) {
                                clearInterval(this.intervals[video.id]);
                            }

                            this.videos = this.videos.map(v => {
                                if (v.id === data.id) {
                                    return data;
                                }

                                return v;
                            });
                        });
                    }, 3000);
                });
            });
        }
    }
};
</script>
