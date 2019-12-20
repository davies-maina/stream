<template>
    <div class="col-md-8">
       
            <div class="card p-3 d-flex align-items-center justify-content-lg-center" v-if="!selected">
                 <input type="file" multiple ref="videos" id="videoFiles" style="display:none;" @change="uploadVideo">

                <p class="text-center">Upload video(S)</p>
                <img src="https://img.icons8.com/dotty/80/000000/upload-to-ftp.png" onclick="document.getElementById('videoFiles').click()">
            
        </div>
        <div class="card p-3" v-else>
        <div class="my-4" v-for="video in videos" :key="video.title">
                            <div class="progress mb-3" >
                                <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" :style="{width: `${progress[video.name]}%`}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center align-items-center" style="height: 180px; color: white; font-size: 18px; background: #808080;">
                                            Loading thumbnail ...
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="text-center">
                                       {{video.name}}
                                    </h4>


                                </div>
                            </div>
        </div>
        </div>
       
    </div>
</template>

<script>
export default {

    props:['channel'],
    data() {
        return {
            selected:false,
            videos:[],

            progress:{}
        }
    },

    methods: {
        uploadVideo(){

            this.selected=true

            const videos=this.$refs.videos.files
            this.videos=Array.from(videos);

            const vidUploads=this.videos.map(video=>{

                const form=new FormData();

                this.progress[video.name]=0;
                form.append('video', video);
                form.append('title', video.name)

                return axios.post(`/channels/${this.channel.id}/videos`, form,{

                    onUploadProgress:(event)=>{

                        this.progress[video.name]=Math.ceil((event.loaded/event.total)*100);

                        this.$forceUpdate();
                    }
                })
            })
    }
}
}
</script>