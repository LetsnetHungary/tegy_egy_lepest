<header style="opacity: 1; z-index: 2; height: 103px;">
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<div class="hero">
   <div class="container">
      <div class="row">
         <nav class="header d-flex justify-content-center-md navbar fixed-top navbar-expand-md navbar-light" style="background-color: white; padding: 0 40px;">
               <a href="/" class="navbar-brand text-primary" id="logo">
                  <img src="/assets/images/Tegyegylepest_logo.jpg" style="" width="230" height="93" class="d-inline-block align-top" alt="">
               </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
               <ul class="navbar-nav">
                  <li class="nav-item dropdown header-intro">
                    <a class="nav-link" href="/Index">
                      Bemutatkozás<span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a style="font-size: 1em;" class="dropdown-item" href="/Index#about">Az alapítványról</a>
                      <a  style="font-size: 1em;" class="dropdown-item" href="/Index#members">A kuratórium tagjai</a>
                      <!-- <a class="dropdown-item header-text" href="/Index#docs">Beszámolók</a> -->
                    </div>
                  </li>
                  <li class="nav-item active header-text">
                     <a href="/Projektek" class="nav-link">Projektek</a>
                  </li>
                  <li class="nav-item header-text">
                     <a href="/Kontakt" class="nav-link">Elérhetőség</a>
                  </li>
                  <!-- <li class="nav-item header-text">
                     <a href="/Ado" class="nav-link">Adó 1%</a>
                  </li> -->
               </ul>
            </div>
         </nav>
      </div>
   </div>
</div>
<div class="header-space" style="height: 103px;">

</div>
</header>


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
