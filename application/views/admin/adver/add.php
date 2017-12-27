
<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo admin_url('home'); ?>">Home panel</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Thêm quảng cáo</a>
				</li>
			</ul>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Thông tin quảng cáo</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
						  <fieldset>
					
					
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tiêu đề </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="name" value="<?php echo set_value('name'); ?>" >
								<div class="help-block"><?php echo form_error('name'); ?></div>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="">Trạng thái hiển thị</label>
							  <div class="controls">
								<select name="status">
									<?php echo get_adver_status(0,0); ?>
								</select>
								
							  </div>
							</div>          

							<div class="control-group">
							  <label class="control-label" for="">Ảnh quảng cáo </label>
							  <div class="controls">
						<input class="" id="image" type="file" name="image" value="<?php echo set_value('image'); ?>">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Link</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="link" value="<?php echo set_value('link'); ?>" >
								<div class="help-block"><?php echo form_error('link'); ?></div>
							  </div>
							</div>
								<div class="control-group">
							  <label class="control-label" for="typeahead">time out</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" name="time_out" value="<?php echo set_value('time_out'); ?>" >
								<div class="help-block"><?php echo form_error('time_out'); ?></div>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="">Trạng thái</label>
							  <div class="controls">
								<select name="status">
									<?php echo yes_no(1,0); ?>
								</select>
								
							  </div>
							</div>          

							<div class="form-actions">
							  <input type="submit" class="btn btn-primary" value="Lưu thông tin">
							  <button type="reset" class="btn">Bỏ qua</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			</div>