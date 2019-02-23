</div></div>
  <div class="col-md-2">
                {% if hide_nav == false %}
                <div id="sub">
                    	<table border="0" id="tablestyle1">
						<tr>
							<th width="174">Notices</th>
						</tr>
						<tr>
						   <td> {{ header | raw}}</td>
						</tr>
						<tr>
               
            <td> <h1>{{ username }}</h1></td>
             
              </tr>
            
             <tr>        
                  
               

        <table id="account-information">
          <ul style="list-style-type: none; padding-left:0px;">
              <li>Hostname: <span class="tag is-dark pull-right">{{ hostname }}:{{ port }}
              	</span>
			</li><li><br></li>
			<li>IP Address: <span class="tag is-dark pull-right">{{ ip }}:{{ port }}</li><li><br></li>
			<li>MySQL Hostname: <span class="tag is-info pull-right">localhost</span></li><li><br></li>
				<li>MySQL Username: <span class="tag is-info pull-right">{{ username }}</span></li><li><br></li>
				<li>MySQL Password: <span class="tag is-info pull-right">Same as CP</span></li><li><br></li>
   	<li>Database: <span class="tag is-info pull-right">{{ username }}</span></li><li><br></li>
   	
   	  <li>FTP Hostname: <span class="tag is-info pull-right">{{ ip }}:21</li><li><br></li>
    <li>FTP Username: <span class="tag is-info pull-right">{{ username }}</span></li><li><br></li>
       <li>FTP Password: <input type="text" class="pull-right"  style="width:100px" value="{{ ftppass }}" disabled></li><li><br></li>
<li><br></li><li><br></li>
<li>Status: {{ status }} </li><li><br></li>
 <li>MySQL Status: <i class="fa fa-check pull-right" aria-hidden="true"></i></li><li><br></li>
	   <li>IntISP Status: <i class="fa fa-check pull-right" aria-hidden="true"></i></li><li><br></li>
	   <style>
	   .progress, .progress-bar-striped, .progress-bar {height: 10px !important;}
	   </style>
	     <li>	Disk Space ({{ disk }}%):<br>
      


<progress class="progress is-small" value="{{ disk }}" max="100">{{ disk }}%</progress>
            </li>
                </ul>
      
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
   


 		<div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div>
	{{ microsoft | raw }}
	</div>
  

</tr></td></table>
              

<!-- Modal -->

              {% endif %}
</div>
</div>
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
                                                  </div>


</body>
</html> 