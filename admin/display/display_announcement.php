  <?php $timer = date("Y-m-d h:i:s"); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>ANNOUNCEMENTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Announcements</a></li>
              <li class="breadcrumb-item active">SMCC TVET</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
      	<div class="row" id="zzz" style="display:none;">
      		<div class="col-4"></div>
      		<div class="col-4">
	      		<center>
	      			<img src='loading.gif'>
	      		</center>
	      		<h4 style="text-align:center;">Sending Email. Please wait...</h4>
	      		<h4 id="yyy" style="text-align:center; display:none;">Email Sent !</h4>
	      	</div>
	      	<div class="col-4"></div>
      	</div>
      	<form id="annForm" name="annForm" method="post" enctype="multipart/form-data">
          	<div class="row" id="zz1">
            	<div class="col-md-12">
              		<div class="card card-widget" style="border:1px solid #000;">
			            <div class="form-group input-group mb-3">
			                <textarea class="form-control" cols="20" rows="10" placeholder="Enter your announcement..." name="ann" id="ann" required></textarea>
			            </div>
			            <div class="input-group mb-3">
			                <input type="file" class="form-control" name="image" id="image">
			            </div>
			            <div class="form-group input-group mb-3">
			                <input type="submit" class="btn btn-primary btn-block" name="annBtn" value="Announce">
			            </div>
              		</div>
            	</div>
          	</div>
        </form>
      </div>
    </section>

    <?php
    $sql = "SELECT * FROM announcement a,user u, alumni_profile ap where a.userid='$id' AND u.userid=a.userid 
    AND ap.alumni_id = u.alumni_id ORDER BY a.aid DESC";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
      $fullname = $row["fname"]."&nbsp;".$row["mname"]."&nbsp;".$row["lname"]."&nbsp;".$row["ext"];
      $aid = $row["aid"];
	  	$word = explode(" ",$row["date_created"]);
	  	$i = $word[0];
      $pix = $row["picture"];
      if($pix==""){
        $pix = "../dist/img/default.png";
      }

	  	$post_date = date("M-d-Y",strtotime($i));
	    //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	?>
		<section class="content">
	    	<div class="container-fluid">
	    		<div class="row">
		        	<div class="col-md-12">
		            <!-- Box Comment -->
		            <div class="card card-widget" style="border:1px dashed #000;">
		            	<div class="card-header">
		                	<div class="user-block">
		                  		<img class="img-circle" src="<?php echo $pix; ?>" alt="<?php echo $fullname; ?>">
		                  		<span class="username"><a href="#"><?php echo $fullname; ?></a></span>
		                  		<span class="description">
		                  			<i><?php echo $row["usertype"]; ?></i>  
		                  			<?php echo $post_date; ?>&nbsp;
		                  		</span>
		                	</div>
		                	<!-- /.user-block -->
		                	<div class="card-tools">
		                  		<button type="button" class="btn btn-tool" data-card-widget="collapse">
		                    	<i class="fas fa-minus"></i>
		                  		</button>
		                  		<button type="button" class="btn btn-tool" title="Edit">
					              <i class="fas fa-edit" onclick="editAnn(<?php echo $aid; ?>)"></i>
					            </button>
		                  		<a type="button" class="btn btn-tool" title="Remove" onclick="deleteAnn(<?php echo $aid; ?>)">
					              <i class="fas fa-times"></i>
					            </a>
		                	</div>
		                	<!-- /.card-tools -->
		              	</div>
		              	<!-- /.card-header -->
		              	<div class="card-body">
		                	<!-- post text -->
		                	<?php
                       $post_text = detect_links($row["content"]);
                       //echo nl2br($row["content"]);
                       echo nl2br($post_text); 
                       ?>
                      <?php
                        if(!$row["picpath"]==""){
                          echo '<br><br>
                          <center><img src="'.$row["picpath"].'?v='.$timer.'" class="img-fluid"></center>';
                        }
                      ?>
		                	<hr>
		                	<!-- /.attachment-block -->
		                	<span class="float-left text-muted">
                        <?php echo num_comment($aid,$db); ?></span>
		              	</div>
		              	<!-- /.card-body -->
		              	<div class="card-footer card-comments" style="border:1px dashed gray;">
		                	<?php load_comment($aid,$db); ?>
		              	</div>
		              	<!-- /.card-footer -->
		              	<div class="card-footer">
		                	<form action="add/save_comment.php" method="post">
		                  		<img class="img-fluid img-circle img-sm" src="<?php echo $_SESSION['pic'].'?v='.$timer; ?>" alt="Alt Text">
		                  		<!-- .img-push is used to add margin to elements next to floating images -->
		                  		<div class="img-push">
                              <div class="input-group input-group-sm">
                                <input type="hidden" name="annId" value="<?php echo $aid; ?>">
                                <input type="text" class="form-control" name="comtxt">
                                <span class="input-group-append">
                                  <input type="submit" class="btn btn-info btn-flat" value="Comment" name="btnComment">
                                </span>
                              </div>
		                  		</div>
		                	</form>
		              	</div>
		              	<!-- /.card-footer -->
		            </div>
		            <!-- /.card -->
		        	</div>
	        		<!-- /.col -->
	    		</div>
	   		</div>
	    </section>

	<?php
	  }
	} else {
	  //echo "0 results";
	}

    ?>

</div>
<!-- /.content-wrapper -->