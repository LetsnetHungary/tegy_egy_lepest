<main style="background: #c5ccd8;">
<div class="jumbotron jumbotron-fluid" style="background:#68bc62">
   <div class="container">
     <h1 class="display-4">Projektek</h1>
       <hr class="m-y-md">
     <p class="lead">Alább láthatók a folyamatban lévő illetve lezárult projektek</p>
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
         <? for ($i=0; $i < 3; $i++) { ?>
            <div class="projekt">
               <div class="card" style="background: #c5ccd8;">
                 <div class="card-block">
                   <a href=""><h4 class="card-header" style="color: #68bc62;">ESEMÉNY<? print_r($i+1); ?></h4></a>
                   <p class="card-text projekt-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                 </div>
               </div>
            </div>
         <? } ?>
      </div>
      <div class="tab-pane" id="two">
         <h3 class="display-4">Lezárult projektek</h3>
         <hr class="my-4">
         <? for ($i=0; $i < 3; $i++) { ?>
            <div class="projekt">
               <div class="card" style="background: #c5ccd8;">
                 <div class="card-block">
                   <a href=""><h4 class="card-header" style="color: #68bc62;">ESEMÉNY <? print_r($i+1); ?></h4></a>
                   <p class="card-text projekt-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                 </div>
               </div>
            </div>
         <? } ?>
      </div>
   </div>
</div>
</main>
