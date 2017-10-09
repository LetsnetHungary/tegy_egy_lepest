<main>
    <div class="container">
      <nav aria-label="Page navigation example" class="buttons">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#" onclick="setup(0)">New</a></li>
        </ul>
      </nav>
      <nav aria-label="Page navigation example" class="buttons">
        <ul class="pagination">
          <?php
            $counter = 1;
            foreach($this->contents as $value){
              ?>
              <li class="page-item"><a class="page-link" href="#" onclick="setup(<?php echo $counter++; ?>)"><?php echo $value["title"]; ?></a></li>
              <?php
            }
          ?>
        </ul>
      </nav>
      <nav aria-label="Page navigation example" class="buttons">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#" onclick="setup(<?php echo $counter++; ?>)">Upload Image</a></li>
        </ul>
      </nav>
    </div>

    <div class="new" style="display: none" id="0">
      <div class="container">
        <form method="post" id="egf" action="Admin/upload">
          <div class="form-group" style="display: flex; align-items: center;">
            <label for="title_area">Projekt típusa</label>
            <input type="radio" class="form-control" id="title_area" style="width: 20px; margin-left: 30px" name="project" checked="checked" value="lezarult">Lezárult
            <input type="radio" class="form-control" id="title_area" style="width: 20px; margin-left: 30px" name="project" value="futo">Futó
          </div>
          <div class="form-group">
            <label for="title_area">Title</label>
            <input name="title" class="form-control" id="title_area">
          </div>
          <div class="form-group">
            <label for="title_area">Subtitle</label>
            <textarea class="form-control" id="exampleTextarea" rows="3"name="subtitle"></textarea>
          </div>
          <div class="form-group">
            <label for="date_area">Date</label>
            <input name="date" class="form-control" id="date_area">
          </div>
          <div class="form-group">
            <label for="date_area">Content</label>
            <textarea class="ckeditor" name="editor" id="content_area"></textarea>
          </div>
          <div class="form-group submit_holder">
            <input type="submit" name="" class="btn btn-primary"id="new_form" value="Save">
          </div>
        </form>
      </div>
    </div>


    <?php
      $counter = 1;
      foreach ($this->contents as $key => $value) {
        ?>
        <div class="existing1" id="<?php echo $counter++ ?>" style="display: none">
          <div class="container">
            <form method="post" action="Admin/update">
              <div class="project_row column">
                <div class="form-group mod" style="display: flex; align-items: center;">
                  <label for="title_area">Projekt típusa</label>
                  <input type="radio" class="form-control" id="title_area" style="width: 20px; margin-left: 30px" name="project" value="lezarult">Lezárult
                  <input type="radio" class="form-control" id="title_area" style="width: 20px; margin-left: 30px" name="project" value="futo">Futó
                </div>
                <div class="prev_project prev">
                  <?php
                    echo $value["project"]=="lezarult" ? "Lezárult" : "Futó";
                  ?>
                </div>
              </div>
              <div class="title_row column">
                <div class="form-group mod">
                  <label for="title_area">Title</label>
                  <input name="title" class="form-control" id="title_area">
                </div>
                <div class="prev_title prev">
                  <?php
                    echo $value["title"];
                  ?>
                </div>
              </div>
              <div class="subtitle_row column">
                <div class="form-group mod">
                  <label for="title_area">Subtitle</label>
                  <textarea class="form-control" id="exampleTextarea" rows="3" name="subtitle"></textarea>
                </div>
                <div class="prev_subtitle prev">
                  <?php echo $value["subtitle"]; ?>
                </div>
              </div>
              <div class="date_row column">
                <div class="form-group mod">
                  <label for="date_area">Date</label>
                  <input name="date" class="form-control" id="date_area">
                </div>
                <div class="prev_date prev">
                  <?php
                    echo $value["date"];
                  ?>
                </div>
              </div>
              <div class="content_row column">
                <div class="form-group mod">
                  <label for="date_area">Content</label>
                  <textarea class="ckeditor" name="editor" id="content_area"></textarea>
                </div>
                <div class="content prev">
                  <?php
                    echo $value["editor"];
                  ?>
                </div>
              </div>
              <div class="form-group mod submit_holder">
                <input type="hidden" name="id" value="<?php echo $key; ?>">
                <input type="submit" name="delete" class="btn btn-danger" value="Delete project">
                <input type="submit" name="save" class="btn btn-primary" value="Save changes">
              </div>
            </form>
          </div>
        </div>
        <?php
      }
    ?>





    <div class="image" style="display: none" id="<?php echo $counter++; ?>">

      <div class="images" style="display: flex; justify-content: center; align-items: center; padding: 10px; flex-wrap: wrap;">
        <?php
          foreach(scandir("images/") as $value){
            if(substr($value, -3) == "jpg" || substr($value, -3) == "png" ||substr($value, -3) == "gif" ||substr($value, -3) == "png"){
            ?>
            <div style="display: flex;align-items: center;flex-direction: column; height: 300px;">
              <div class="image_holder">
                <div class="background"  style="background: url(images/<?php echo $value; ?>)">
                </div>
                <img src="images/<?php echo $value; ?>" alt="" class="img">
                <form action="Admin/deleteimage/<?php echo $value; ?>" method="post" style="position: absolute; z-index: 5;" class="delete">
                  <button type="submit" style="background-color: rgba(0,0,0,0); border-color: rgba(0,0,0,0)"><i class="material-icons" style="font-size: 60px; cursor: pointer; color: red; width: 60px; height: 60px">close</i></button>
                </form>
              </div>
              <p style=" word-wrap: break-word; max-width: 220px;">images/<?php echo $value; ?></p>
            </div>
            <?php
          }}
        ?>
      </div>
      <div class="container">
        <form method="post" enctype="multipart/form-data" style="display: flex; align-items: center" action="Admin/saveimage">
            <div class="custom-file">
              <input type="file" id="img" name="image" class="custom-file-input" style="width: 500px;">
              <span class="custom-file-control form-control-file"></span>
            </div>
          <input type="submit" value="Upload image" name="submit" class="btn btn-primary" style="margin-left: 5px">
        </form>
      </div>
    </div>
    <script type="text/javascript">
        $("#img").on('change',function(){
          var fileName = $(this).val();
           $(this).next('.form-control-file').addClass("selected").html(fileName);
        })
    </script>
</main>
<script type="text/javascript" src ="../../assets/js/admin.js"></script>
