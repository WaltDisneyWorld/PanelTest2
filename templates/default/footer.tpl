   </div><!-- row -->

        </div><!-- col-md-9 -->
        <div class="col-md-2 col-lg-2 dash-right">
          <div class="row">
            <div class="col-sm- col-md-12 col-lg-12">
                {% if hide_nav == false %}
                <form class="navbar-form" role="search">
                <div class="input-group">
             <h1>{{ username }}</h1>
             
                </div>
            </form>
                        </div>
                        
                    <div class="list list-info">
					<div class="panel panel-primary list-announcement">
					      <div class="panel-body">
                                    {{ header | raw }} 
									  </div>
                    </div>
                    </div>
                        <div class="list list-info">
    <div class="account-information">
  <div class="panel panel-default">
  <div class="panel-heading">Server Info</div>
  <div class="panel-body">
        <table id="account-information">
          <ul style="list-style-type: none; padding-left:0px;">
              <li>Hostname: <span class="tag is-dark pull-right">{{ hostname }}:{{ port }}
              	</span>
			</li>
			<li>IP Address: <span class="tag is-dark pull-right">{{ ip }}:{{ port }}</li>
			<li>MySQL Hostname: <span class="tag is-info pull-right">localhost</span></li>
				<li>MySQL Username: <span class="tag is-info pull-right">{{ username }}</span></li>
				<li>MySQL Password: <span class="tag is-info pull-right">Same as CP</span></li>
   	<li>Database: <span class="tag is-info pull-right">{{ username }}</span></li>
   	
   	  <li>FTP Hostname: <span class="tag is-info pull-right">{{ ip }}:21</li>
    <li>FTP Username: <span class="tag is-info pull-right">{{ username }}</span></li>
       <li>FTP Password: <input type="text" class="pull-right"  style="width:100px" value="{{ ftppass }}" disabled></li><li><br></li>
<li><br></li>
<li>Status: {{ status }} </li>
 <li>MySQL Status: <i class="fa fa-check pull-right" aria-hidden="true"></i></li>
	   <li>IntISP Status: <i class="fa fa-check pull-right" aria-hidden="true"></i></li>
	   <style>
	   .progress, .progress-bar-striped, .progress-bar {height: 10px !important;}
	   </style>
	     <li>	Disk Space ({{ disk }}%):<br>
      


<progress class="progress is-small" value="{{ disk }}" max="100">{{ disk }}%</progress>
            </li>
                </ul>
          </div>
          <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                  
                                                    <th>IP</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{ failed_login | raw }}
                                                       </tbody>
                                        </table>
        </table>
    </div>
   
</div>       
<div class="list list-info">
<div class="row">

 		<div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div>
	{{ microsoft | raw }}
	</div>
  
</div> 
                </div>
              </div>
            </div><!-- col-md-12 -->
       

        </div><!-- col-md-3 -->
      </div><!-- row -->

    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

</section>
<!-- Modal -->
              {% endif %}
                <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change My Password</h4>
        </div>
        <form method="POST" action="action.php?action=pass">
        <div class="modal-body">
             <form class="form-horizontal" role="form">
                  <div class="form-group">
                  	<input type="hidden" name="username" value="{{ username }}">
                    <label  class="col-sm-2 control-label" for="inputEmail3">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Change Password</button>
                    </div>
                  </div>
        </div></form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  </div>
</div>
                                                  

<script src="{{ template_dir }}/public/lib/jquery/jquery.js"></script>
<script src="{{ template_dir }}/public/lib/jquery-ui/jquery-ui.js"></script>
<script src="{{ template_dir }}/public/lib/bootstrap/js/bootstrap.js"></script>
<script src="{{ template_dir }}/public/lib/jquery-toggles/toggles.js"></script>


<script src="{{ template_dir }}/public/lib/raphael/raphael.js"></script>

<script src="{{ template_dir }}/public/lib/flot/jquery.flot.js"></script>
<script src="{{ template_dir }}/public/lib/flot/jquery.flot.resize.js"></script>
<script src="{{ template_dir }}/public/lib/flot-spline/jquery.flot.spline.js"></script>

<script src="{{ template_dir }}/public/lib/jquery-knob/jquery.knob.js"></script>

<script src="{{ template_dir }}/public/js/custom.js"></script>
<script type="text/javascript" src="{{ template_dir }}/public/textedit/scripts/jHtmlArea-0.8.js"></script>
<script>
    $('textarea').htmlarea();
</script>
</body>
</html> 