<main style="background: #e3e8ef;">

<div class="jumbotron jumbotron-fluid myJumbotron">
   <div class="container">
     <h1 class="display-4">Projektek</h1>
       <hr class="m-y-md">
     <p class="lead projekt-lead">Alább láthatók a folyamatban lévő illetve lezárult projektek</p>
   </div>
</div>

<div class="container">
   <nav class="nav justify-content-center nav-pills flex-column flex-md-row">
      <a class="nav-link active" href="#one" data-toggle="tab">Futó projektek</a>
      <a class="nav-link" href="#two" data-toggle="tab">Lezárult projektek</a>
   </nav>
   <div class="tab-content py-5">
      <div class="tab-pane active" id="one">
         <h3 class="display-4">Futó projektek</h3>
         <hr class="my-4">
         <?
         $lezarult = array();
         $futo = array();
         foreach ($this->contents as $key => $value) {
           if($value["project"] == "lezarult"){
             $lezarult[$key] = $value;
           }
           else{
             $futo[$key] = $value;
           }
         }
         foreach($futo as $key => $project) { ?>
            <div class="projekt">
               <div class="card" style="background: #c5ccd8;">
                 <div class="card-block">
                   <a href="Projektek/<?php echo $key; ?>"> <h4 class="card-header" style="color: #68bc62;"><? echo $project["title"]; ?></h4></a>
                   <p class="card-text projekt-text"><?php echo $project["subtitle"]; ?></p>
                 </div>
               </div>
            </div>
         <? } ?>
      </div>
      <div class="tab-pane" id="two">
         <h3 class="display-4">Lezárult projektek</h3>
         <hr class="my-4">
         <? foreach($lezarult as $key => $project) { ?>
            <div class="projekt">
               <div class="card" style="background: #c5ccd8;">
                 <div class="card-block">
                   <a href="Projektek/<?php echo $key; ?>"><h4 class="card-header" style="color: #68bc62;"><? echo $project["title"]; ?></h4></a>
                   <p class="card-text projekt-text"><?php echo $project["subtitle"]; ?></p>
                 </div>
               </div>
            </div>
         <? } ?>
      </div>
   </div>
</div>
</main>
