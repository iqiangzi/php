<?php $this->_compileInclude('head'); ?>
<body>
<!--导航-->
<?php $this->_compileInclude('nav'); ?>
<div id="main">
	<!--主体左侧-->
	<?php $this->_compileInclude('left'); ?>
	<!--主体左侧 结束-->
	<!--主体右侧 -->
	<div id="right_760" class="right_760">
    	<?php $this->_compileInclude('bread'); ?>
    	<div class="bor_top"></div>
    	<div class="bor_mid">
            <div id="hide_left"><a href="javascript:pr()"></a></div>
  	  	  <div id="result">
            <h2 class="page_title"><img src="app/exam/styles/image/result_tit.jpg" alt="成绩单" /></h2>
            <h1><?php echo $this->tpl_var['sessionvars']['examsession']; ?></h1>
            <div id="result_box">
            <h3><?php echo $this->tpl_var['sessionvars']['examsessionscore']; ?>分</h3>
            <div id="result_con">
           	  <div class="mb_10"><b class="blue">考试详情：</b></div>
              <p class="mb_10">总分：<b class="orange"><?php echo $this->tpl_var['sessionvars']['examsessiontime']; ?></b>分 合格分数线：<b class="orange">60</b>分 答卷耗时：<b class="orange"><?php echo $this->tpl_var['sessionvars']['examsessiontime']; ?></b>分钟</p>
                  <table width="100%">
                          <tr>
                            <th>题型</th>
                            <th>总题数</th>
                            <th>答对题数</th>
                            <th>总分</th>
                            <th>得分</th>
                          </tr>
                          <?php $nid = 0;
 foreach($this->tpl_var['number'] as $key => $num){ 
 $nid++; ?>
                          <?php if($num){ ?>
                          <tr>
                            <td><?php echo $this->tpl_var['questype'][$key]['questype']; ?></td>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $this->tpl_var['right'][$key]; ?></td>
                            <td><?php echo number_format($num*100/$this->tpl_var['allnumber'],1); ?></td>
                            <td><?php echo number_format($this->tpl_var['score'][$key]*100/$this->tpl_var['allnumber'],1); ?></td>
                          </tr>
                          <?php } ?>
                          <?php } ?>
                          <tr>
                            <td colspan="5" align="left">本次考试共<b class="orange"><?php echo $this->tpl_var['allnumber']; ?></b>道题，总分<b class="orange">100</b>分，您做对<b class="orange"><?php echo $this->tpl_var['allright']; ?></b>道题，得到<b class="orange"><?php echo $this->tpl_var['sessionvars']['examsessionscore']; ?></b>分</td>
                          </tr>
                       </table>
                       <div id="result_btn"><a href="?exam-app-exercise-view">查看答案和解析</a><a href="?exam-app-record">进入我的错题</a></div>
                 </div>
            </div>
            </div>
    	</div>
    	<div class="bor_bottom"></div>
    </div>
	<!--主体右侧 结束-->
	<!--尾部-->
	<?php $this->_compileInclude('foot'); ?>
    <!--尾部 结束-->
</div>
</body>
</html>