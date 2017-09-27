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

</main>
