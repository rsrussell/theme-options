<div class="container mrt50">
  <div class="panel panel-border">
    <div class="clearfix panel-custom-color">
      <div id="of-popup-save" class="of-save-popup">
        <div class="of-save-save"><i class="fa fa-check"></i></div>
      </div>
      <div id="of-popup-fail" class="of-save-popup">
        <div class="of-save-fail"><i class="icon-remove"></i></div>
      </div>
      <div class="panel-heading pull-left">Add New</div>
      <div class="panel-heading pull-right"><a href="admin.php?page=getweb_option_menus" class="btn btn-color">Back</a></div>
    </div>
    <div class="panel-body">
      <form id="frmgetweb" class="form-horizontal" action="#" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
        <div class="col-sm-9">
          <div class="form-group">
            <label for="name" class="col-sm-2">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control input-sm" name="name" id="name" placeholder="Enter Name">
              <small class="text-danger form-control-msg">Please enter menu name</small>
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-2">Visibility</label>
            <div class="col-sm-10">
              <select name="status" id="status" class="form-control">
                <option value="1">Visible</option>
                <option value="0">Unvisible</option>
              </select>
              <small class="text-danger form-control-msg">Choose visibility</small>
            </div>
          </div>
          <div class="form-group">
            <label for="extra_class" class="col-sm-2">Extra Class</label>
            <div class="col-sm-10">
              <input type="text" class="form-control input-sm" name="extra_class" id="extra_class" placeholder="Enter Extra Class">
            </div>
          </div>
          <div class="text-right">
            <button type="submit" class="btn btn-color">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
