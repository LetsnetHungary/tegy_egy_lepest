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
    </div>

    <div class="new" style="display: none" id="0">
      <div class="container">
        <form method="post" id="egf" action="Admin/upload">
          <div class="form-group">
            <label for="title_area">Title</label>
            <input name="title" class="form-control" id="title_area">
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
            <input type="submit" name="" class="btn btn-primary"id="new_form" value="Save changes">
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
                <input type="submit" name="" class="btn btn-primary" value="Save changes">
              </div>
            </form>
          </div>
        </div>
        <?php
      }
    ?>
</main>
<script type="text/javascript" src ="../../assets/js/admin.js"></script>
