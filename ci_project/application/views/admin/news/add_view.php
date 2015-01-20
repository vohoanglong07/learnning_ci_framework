<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="widget widget-table action-table">
                        <div class="widget-header"> <i class="icon-th-large"></i>
                            <h3>News / Add</h3>
                        </div>
                        <div class="widget-content">
                            <?php
                            if (validation_errors('<li>', '</li>') != '') {
                                echo '<div class="alert alert-danger alert-dismissible my_error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                echo validation_errors('<li>', '</li>');
                                echo '</div>';
                            }

                            if (isset($error)) {
                                echo '<div class="alert alert-danger alert-dismissible my_error" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                                echo '<li>'.$error.'</li>';
                                echo '</div>';
                            }
                            ?>
                            <form action="<?php echo base_url() . $module; ?>/news/add" method="post" enctype="multipart/form-data">
                                <div class="form-data">
                                    <div class="form-group">
                                        <label for="ftitle">Title</label>
                                        <input type="text" class="form-control" id="ftitle" name="ftitle" placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="finfo">Info</label>
                                        <textarea name="finfo" id="finfo" cols="35" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="fdetail">Detail</label>
                                        <textarea name="fdetail" id="fdetail" cols="50" rows="40"></textarea>
                                        <script type="text/javascript">
                                            CKEDITOR.replace( 'fdetail' );
                                            CKEDITOR.replace( 'finfo' );
                                        </script>
                                    </div>
                                    <div class="form-group">
                                        <label for="fauthor">Author</label>
                                        <input type="text" class="form-control" name="fauthor" id="fauthor" placeholder="Enter author">
                                    </div>
                                    <div class="form-group">
                                        <label for="fimage">Image</label>
                                        <input type="file" name="ffile" />
                                    </div>
                                    <div class="form-group">
                                        <label for="fcategory">Parent</label>
                                        <select id="fcategory" name="fcategory" class="form-control">
                                            <?php
                                            echo callMenu($categories);
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="fsubmit" value="Add" class="btn btn-success" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->