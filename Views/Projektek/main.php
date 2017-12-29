<main style="background: #e3e8ef;">
    <div class="jumbotron-fluid myJumbotron" style="padding: 30px 0; margin-bottom: 20px;" id="projektek">
       <div class="container">
         <h1 class="display-4">Projektek</h1>
           <hr class="m-y-md">
         <p class="lead">Alább láthatók a folyamatban lévő illetve lezárult projektek</p>

       </div>
    </div>

    <div class="container">
       <nav class="nav justify-content-center nav-pills flex-column flex-md-row">
       <a class="nav-link active" href="#two" data-toggle="tab">Lezárult projektek</a>
          <a class="nav-link" href="#one" data-toggle="tab">Futó projektek</a>
       </nav>
       <div class="tab-content py-5">
          <div class="tab-pane" id="one">
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
                       <a href="Projektek/<?php echo $key; ?>" class=" project-header"> <h4 class="card-header" style="color: #68bc62;"><? echo $project["title"]; ?></h4></a>
                       <p class="card-text projekt-text"><?php echo $project["subtitle"]; ?></p>
                     </div>
                   </div>
                </div>
             <? } ?>
          </div>
          <div class="tab-pane active" id="two">
             <h3 class="display-4">Lezárult projektek</h3>
             <hr class="my-4">
             <p>Alapítványunk 2017-ben indult a Magyar Nemzeti Bank pályázatán, melyben támogatást
    kért a Mozgásjavító Óvoda, Általános Iskola, Gimnázium, Szakgimnázium, EGYMI és
    Kollégium tanulóinak és klienseinek életminőségét javító, társadalmi integrációját
    elősegítő programjainak megvalósítására. A programok keretében családi, nyári
    bentlakásos és tematikus táborok szervezését, illetve attitűdformáló, társadalmi
    érzékenyítést támogató programok megvalósítását tűztük ki célul. A támogatási cél
    megvalósulásához az MNB – az Ismeretterjesztési és Támogatási Bizottság döntése
    alapján – 2.810.000 Ft összegű, vissza nem térítendő támogatást nyújtott karitatív célból.</p>
             <? foreach($lezarult as $key => $project) { ?>
                <div class="projekt">
                   <div class="card" style="background: #c5ccd8;">
                       <a href="Projektek/<?php echo $key; ?>" class="project-header"><h4 class="card-header d-flex" style="color: #62656b;"><? echo $project["title"]; ?><i class="fa fa-arrow-right float-right" style="" aria-hidden="true"></i></h4></a>
                       <!-- <p class="card-text projekt-text"><?php echo $project["subtitle"]; ?></p> -->

                   </div>
                </div>
             <? } ?>
          </div>
       </div>
    </div>
</main>
