<main style="background: #e3e8ef;">
  <?php $project = $this->contents[0];
  ?>
<div class="jumbotron jumbotron-fluid myJumbotron" style="">
   <div class="container">
     <h1 class="display-4"><?php echo $project["title"]; ?></h1>
       <hr class="m-y-md">
     <p class="lead"><?php echo $project["subtitle"]; ?></p>
     <p class="lead"><?php echo $project["date"]; ?></p>
   </div>
</div>
<div class="container">
   <p><?php echo $project["editor"]; ?></p> </br>

</div>



<!-- Modal -->
<div class="modal fade" id="picModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 80vw">
    <div class="modal-content" id="picModalContent"></div>
  </div>
</div>
</main>
<script type="text/javascript">
$('img').click(function(){
    var imgSrc = $(this).attr('src')
    console.log(imgSrc)

$('#picModalContent').replaceWith('<div class="modal-content" id="picModalContent"><img alt="" src="'+ imgSrc + '" style="max-width: 90vw; max-height: 90vh"/></div>')
})
</script>
