<template>
  <div>
      <div id="laravue-player">

      </div>
  </div>
</template>

<script>
import Vimeo from '@vimeo/player';

export default {
    props : ['video','next'],
  mounted() {
      
    var options= {
      id: this.video.vimeo_video_id,
      width: 1100,
    };

    let player = new Vimeo('laravue-player',options)
  
    
   
  player.on('ended', () => {
       
      console.log("End")
        // console.log('video Ended',this.next.url)
        window.location.replace(this.next.url)

});



  }
};

</script>
<style  scoped>
iframe{
    position: absolute;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100%;
}
</style>
