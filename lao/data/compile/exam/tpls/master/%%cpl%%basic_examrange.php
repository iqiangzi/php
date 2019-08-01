<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<?php $this->_compileInclude('menu'); ?>
		</div>
		<div class="span10" id="datacontent">
<?php } ?>
			<ul class="breadcrumb">
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a> <span class="divider">/</span></li>
				<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">考场管理</a> <span class="divider">/</span></li>
				<li class="active">考试范围</li>
			</ul>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">考试范围</a>
				</li>
				<li class="dropdown pull-right">
					<a href="index.php?exam-master-basic&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">考场管理</a>
				</li>
			</ul>
	        <form action="?exam-master-basic-setexamrange" method="post" class="form-horizontal">
				<table class="table">
					<thead>
					<tr>
						<th colspan="8"><?php echo $this->tpl_var['basic']['basic']; ?></th>
					</tr>
					</thead>
					<tr>
						<td>
							考场ID：
						</td>
						<td>
							<?php echo $this->tpl_var['basic']['basicid']; ?>
						</td>
						<td>
							科目：
						</td>
						<td>
							<?php echo $this->tpl_var['subjects'][$this->tpl_var['basic']['basicsubjectid']]['subject']; ?>
						</td>
						<td>
							地区：
						</td>
			        	<td>
			        		<?php echo $this->tpl_var['areas'][$this->tpl_var['basic']['basicareaid']]['area']; ?>
			        	</td>
			        	<td>
							API标识：
						</td>
						<td>
							<?php echo $this->tpl_var['basic']['basicapi']; ?>
						</td>
					</tr>
				</table>
				<div class="control-group">
					<label class="control-label">章节选择：</label>
				</div>
				<?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
				<div class="control-group">
					<label class="control-label">
				        <?php echo $section['section']; ?>
				    </label>
				    <div class="controls" style="text-indent:10px;">
				    	<?php $kid = 0;
 foreach($this->tpl_var['knows'][$section['sectionid']] as $key => $know){ 
 $kid++; ?>
				    	<label class="checkbox inline"><input type="checkbox" value="<?php echo $know['knowsid']; ?>" name="args[basicknows][<?php echo $section['sectionid']; ?>][<?php echo $know['knowsid']; ?>]" <?php if($this->tpl_var['basic']['basicknows'][$section['sectionid']][$know['knowsid']] == $know['knowsid']){ ?>checked<?php } ?>/><?php echo $know['knows']; ?></label>
				    	<?php } ?>
				    </div>
				</div>
				<?php } ?>
				<div class="control-group">
					<label for="basicexam_auto" class="control-label">绑定随机抽题试卷：</label>
					<div class="controls">
						<textarea id="basicexam_auto" name="args[basicexam][auto]" needle="needle" msg="您必须填写至少一个试卷"><?php echo $this->tpl_var['basic']['basicexam']['auto']; ?></textarea>
						<span class="help-block">请在试卷管理 > 随机组卷处查看试卷ID，将数字ID填写在这里，多个请用英文逗号（,）隔开。留空或填0时将无法进行该项考试。</span>
					</div>
				</div>
				<div class="control-group">
					<label for="basicexam_autotemplate" class="control-label">随机试卷模板：</label>
					<div class="controls">
						<select id="basicexam_autotemplate" name="args[basicexam][autotemplate]">
							<?php $tid = 0;
 foreach($this->tpl_var['tpls']['ep'] as $key => $tpl){ 
 $tid++; ?>
			            	<option value="<?php echo $tpl; ?>"<?php if($this->tpl_var['basic']['basicexam']['autotemplate'] == $tpl){ ?> selected<?php } ?>><?php echo $tpl; ?></option>
			            	<?php } ?>
		            	</select>
					</div>
				</div>
				<div class="control-group">
					<label for="basicexam_self" class="control-label">绑定手工组卷试卷：</label>
					<div class="controls">
						<textarea id="basicexam_self" name="args[basicexam][self]" needle="needle" msg="您必须填写至少一个试卷"><?php echo $this->tpl_var['basic']['basicexam']['self']; ?></textarea>
						<span class="help-block">请在试卷管理 > 手工组卷处查看试卷ID，将数字ID填写在这里，多个请用英文逗号（,）隔开。留空或填0时将无法进行该项考试。</span>
					</div>
				</div>
				<div class="control-group">
					<label for="basicexam_selftemplate" class="control-label">手工试卷模板：</label>
					<div class="controls">
						<select id="basicexam_selftemplate" name="args[basicexam][selftemplate]">
			            	<?php $tid = 0;
 foreach($this->tpl_var['tpls']['pp'] as $key => $tpl){ 
 $tid++; ?>
			            	<option value="<?php echo $tpl; ?>"<?php if($this->tpl_var['basic']['basicexam']['selftemplate'] == $tpl){ ?> selected<?php } ?>><?php echo $tpl; ?></option>
			            	<?php } ?>
			            </select>
					</div>
				</div>
				<div class="submit">
					<div class="controls">
						<button class="btn btn-primary" type="submit">提交</button>
						<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						<input type="hidden" name="setexamrange" value="1"/>
						<input type="hidden" name="basicid" value="<?php echo $this->tpl_var['basic']['basicid']; ?>"/>
						<?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
						<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
						<?php } ?>
					</div>
				</div>
			</form>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
</body>
</html>
<?php } ?>