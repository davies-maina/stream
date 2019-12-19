<template>
    <div class="col-md-8">
       
            <div class="card p-3 d-flex align-items-center justify-content-lg-center" v-if="!selected">
                 <input type="file" ref="videos" id="videoFiles" style="display:none;" @change="uploadVideo">

                <p class="text-center">Upload video(S)</p>
                <img src="https://img.icons8.com/dotty/80/000000/upload-to-ftp.png" onclick="document.getElementById('videoFiles').click()">
            
        </div>
        <div class="card p-3" v-else>
        <div class="my-4">
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="d-flex justify-content-center align-items-center" style="height: 180px; color: white; font-size: 18px; background: #808080;">
                                            Loading thumbnail ...
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="text-center">
                                        My Awesome video
                                    </h4>


                                </div>
                            </div>
        </div>
        </div>
       
    </div>
</template>

<script>
export default {
    data() {
        return {
            selected:false,
        }
    },

    methods: {
        uploadVideo(){

            this.selected=true

            const videos=this.$refs.videos.files
            console.log(videos);
        }
    },
}
</script>