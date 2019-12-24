<!DOCTYPE html>
<html lang="en">
<head>
	<title>convForm - example</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/jquery.convform.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/demo.css">
</head>
<body>
	<section id="demo">
	    <div class="vertical-align">
	        <div class="container">
	            <div class="row">
	                <div class="col-sm-6 col-sm-offset-3 col-xs-offset-0">
	                    <div class="card no-border">
	                        <div id="chat" class="conv-form-wrapper">
	                            <form action="dashboard.php" method="POST" class="hidden" id="chatbot">
	                            	
	                            	<select name="identify" data-conv-question="Who are you?" data-callback="storeState">
	                            		<option value="student">Student/Parent</option>
	                                    <option value="faculty">Faculty</option>
	                                    <option value="institute">Institute</option>
	                            	</select>
	                            	<div data-conv-fork="identify">
	                            		<div data-conv-case="student">
	                            	
	                                		<select data-conv-question="We are providing excellent education service.Do you want to know our service?">
	                                   	 		<option value="yes">Yes</option>
	                                    		<option value="sure">No</option>
	                                		</select>
	                                		<input type="text" name="name" data-conv-question="Alright! First, tell me your full name, please.|Okay! Please, tell me your name first.">
	                               			<input type="text" data-conv-question="Howdy, {name}:0! It's a pleasure to meet you. (note that this question doesn't expect any answer)" data-no-answer="true">
	                                		
	                               			 <select name="multi[]" data-conv-question="We have multiple courses,which course u want?">
	                                    		<option value="classes">ClassI-ClassXII</option>
	                                   			<option value="technical_languages">Technical Languages</option>
	                                    		<option value="b.tech">B.Tech</option>
	                                   			
	                                		</select>
	                                		
	                                        



	                                        <div data-conv-fork="multi[]">
	                                    		<div data-conv-case="technical_languages">
	                                    			<select data-conv-question="Which Languages you want to learn?">
	                                    					<option value="yes">Basic Computer</option>
	                                    					<option value="yes">Tally</option>
	                                   						<option value="yes">C/C++</option>
	                                       	 				<option value="yes">JAVA</option>
	                                       	 				<option value="yes">PHP</option>
	                                       	 				<option value="yes">PYTHON</option>
	                                       	 				<option value="yes">Other</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       	 	</div>

	                                       	 	<div data-conv-fork="multi[]">
	                                    			<div data-conv-case="b.tech">
	                                    				<select data-conv-question="Which branch you have?">
	                                    					<option value="yes">EEE</option>
	                                    					<option value="yes">ECE</option>
	                                   						<option value="yes">CSE</option>
	                                       	 				<option value="yes">EE</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       	 	</div>

	                                       	 	 <div data-conv-fork="multi[]">
	                                    		<div data-conv-case="classes">
	                                    			<input type="text" name="class"data-conv-question="In which class you are studing" data-no-answer="true">
	                                        <input type="text" data-conv-question="Howdy, {class}:0! " data-no-answer="true">
	                                    		</div>
	                                    	</div>
	                                    	<select name="board" data-callback="storeState" data-conv-question="Which board is the school affiliated to?">
	                                    		<option value="cbse">CBSE</option>
	                                    		<option value="icse">ICSE</option>
	                                    		<option value="ib/igcse">IB/IGCSE</option>
	                                    		<option value="state board">STATE BOARD</option>
	                                    		<option value="state board">Other</option>
	                                    		<input type="text" name="board"data-conv-question="BOARD/UNIVERSITY" data-no-answer="true">


	                                    	</select>
	                                        
	                                        <select name="tuition_place" data-callback="storeState" data-conv-question="Where do you want to take tuition?">
	                                    		<option value="house">At your house</option>
	                                    		<option value="sure">At tution center!</option>
	                               			</select>
	                               			
	                                    	<select name="subject" data-callback="storeState" data-conv-question=" In which subject need help?">
	                                    		<option value="math">Mathematics</option>
	                                    		<option value="science">Science</option>
	                                    		<option value="english">English</option>
	                                    		<option value="hindi">Hindi</option>
	                                    		<option value="social">Social std</option>
	                                    	</select>
	                                    	<select name="time" data-callback="storeState" data-conv-question=" What time the student available to take the classes?">
	                                    		<option value="math">10am-12pm</option>
	                                    		<option value="science">12pm-2pm</option>
	                                    		<option value="english">3pm-5pm</option>
	                                    		<option value="hindi">5pm-7pm</option>
	                                    		<option value="social">6pm-8pm</option>
	                                    	</select>
	                                    	<select name="time" data-callback="storeState" data-conv-question=" How often will the student(s) take classes?">
	                                    		<option value="math">Thrice a week</option>
	                                    		<option value="science">Five times a week</option>
	                                    	</select>
	                                    	<select name="time" data-callback="storeState" data-conv-question=" What is your approximate monthly budget?">
	                                    		<option value="math">3.5k-4.5k</option>
	                                    		<option value="science">4.5k-5.5k</option>
	                                    		<option value="science">5.5k-7k</option>
	                                    	</select>
	                                    	<select name="time" data-callback="storeState" data-conv-question=" How soon would you like to hire?">
	                                    		<option value="math">Immidiately</option>
	                                    		<option value="science">within next two weeks</option>
	                                    		<option value="science">Not sure,just checking price</option>
	                                    	</select>
	                                    	

	                               			<input type="text" name="location"data-conv-question="Location where you require the service:" data-no-answer="true">
	                                        <input type="text" data-conv-question="Howdy, {location}:0! " data-no-answer="true"> 
	                                         <select name="thought" data-conv-question="Do you want us to search teacher according to your preferences?">
		                                    	<option value="yes" data-callback="submitform">Yes</option>
		                                    	<!-- <a href="#">abc</a> -->
		                                    	<option value="no">No..</option>
		                                    </select>
		                                   <script type="text/javascript">
		                                   	function submitform()
		                                   	{
		                                   	    
		                                   	    document.forms["chatbot"].submit();
		                                   	}
		                                   </script>
	                                    </div>
	                                

	                                	<div data-conv-fork="identify">
	                                		<div data-conv-case="faculty">
	                                	
	                                    		<select data-conv-question="We are providing excellent education service.Do you want to know our service?">
	                                       	 		<option value="yes">Yes</option>
	                                        		<option value="sure">No</option>
	                                    		</select>
	                                    		<input type="text" name="name" data-conv-question="Alright! First, tell me your full name, please.|Okay! Please, tell me your name first.">
	                               				<input type="text" data-conv-question="Howdy, {name}:0! It's a pleasure to meet you. (note that this question doesn't expect any answer)" data-no-answer="true">

	                               				<select name="faculty_education" data-conv-question="May i know your qualification?">
	                                       	 		<option value="b.sc">B.SC</option>
	                                       	 		<option value="b.com">B.COM</option>
	                                       	 		<option value="b.a">B.A</option>
	                                       	 		<option value="b.tech/b.e">B.TECH/B.E</option>
	                                        		<option value="m.sc">M.SC</option>
	                                        		<option value="m.com">M.COM</option>
	                                        		<option value="m.a">M.A</option>
	                                        		
	                                    		</select>
	                                    		<div data-conv-fork="faculty_education">
	                                   				<div data-conv-case="b.sc">
	                                   					<select data-conv-question="Which subject you can teach?">
	                                   						<option value="yes">Math</option>
	                                       	 				<option value="yes">Science</option>
	                                       	 				<option value="yes">All</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       		</div>
	                                       	 	<div data-conv-fork="faculty_education">
	                                   				<div data-conv-case="m.sc">
	                                   					<select data-conv-question="Which subject you can teach?">
	                                   						<option value="yes">Math</option>
	                                       	 				<option value="yes">Science</option>
	                                       	 				<option value="yes">All</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       	 	</div>
	                                       	 	<div data-conv-fork="faculty_education">
	                                   				<div data-conv-case="b.com">
	                                   					<select data-conv-question="Which subject you can teach?">
	                                   						<option value="yes">Accounts</option>
	                                       	 				<option value="yes">Economics</option>
	                                       	 				<option value="yes">EVS</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       	 	</div>
	                                       	 	<div data-conv-fork="faculty_education">
	                                   				<div data-conv-case="m.com">
	                                   					<select data-conv-question="Which subject you can teach?">
	                                   						<option value="yes">Accounts</option>
	                                       	 				<option value="yes">Economics</option>
	                                       	 				<option value="yes">EVS</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       	 	</div>
	                                       	 	<div data-conv-fork="faculty_education">
	                                   				<div data-conv-case="b.a">
	                                   					<select data-conv-question="Which subject you can teach?">
	                                   						<option value="yes">Hindi</option>
	                                       	 				<option value="yes">Social.std</option>
	                                       	 				<option value="yes">English</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       	 	</div>
	                                       	 	<div data-conv-fork="faculty_education">
	                                   				<div data-conv-case="m.a">
	                                   					<select data-conv-question="Which subject you can teach?">
	                                   						<option value="yes">Hindi</option>
	                                       	 				<option value="yes">Social.std</option>
	                                       	 				<option value="yes">English</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       	 	</div>
	                                       	 	<div data-conv-fork="faculty_education">
	                                   				<div data-conv-case="b.tech/b.e">
	                                   					<select data-conv-question="Which subject you can teach?">
	                                   						<option value="yes">Math</option>
	                                       	 				<option value="yes">Science</option>
	                                       	 				<option value="yes">Other</option>
	                                       	 			</select>
	                                       	 		</div>
	                                       		</div>

	                               				<select data-conv-question="How many years of experience you have?">
	                                       	 		<option value="yes">0 Year</option>
	                                       	 		<option value="yes">0-1 Year</option>
	                                       	 		<option value="yes">1-2 Year</option>
	                                       	 		<option value="yes">2-3 Year</option>
	                                        		<option value="sure">3-4 Year</option>
	                                        		<option value="yes">4-5 Year</option>
	                                        		<option value="yes">5+</option>
	                                        	</select>
	                               				<input type="text" name="faculty_phone" data-conv-question="contact number?" data-pattern="^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$">
	                               				<input type="text" data-conv-question="{faculty_phone}:0! " data-no-answer="true">

	                               				<input type="text" name="faculty_emailid" data-conv-question="May i know ur Emailid?" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
	                               				
	                               				<input type="text" data-conv-question="{faculty_emailid}:0! " data-no-answer="true">

	                               				<input type="text" name="faculty_emailid" data-conv-question="Thank you we will get back to u soon.">
	                               			</div>
	                               		</div>

	                               		<div data-conv-fork="identify">
	                                		<div data-conv-case="institute">
	                                			<input type="text" name="institute_name" data-conv-question="May i know ur Institute Name?">

	                                			<input type="text" name="institute_address" data-conv-question="May i know Institute Address?">

	                                			<input type="text" name="institute_phone" data-conv-question="contact number?" data-pattern="^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$">

	                               				<input type="text" name="faculty_emailid" data-conv-question="Emailid" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$">
	                               				
	                               				<input type="text" name="faculty_emailid" data-conv-question="Thank you we will get back to u soon.">
	                               			</div>
	                               		</div>





	                                
	                                    <div data-conv-case="no">
		                                    <select name="thought" data-conv-question="How can i help you?!">
		                                    	<option value="yes">Yes</option>
		                                    	<option value="no">No..</option>
		                                    </select>
	                                    </div>
	                                </div>
	                                <input type="text" data-conv-question="convForm also supports regex patterns. Look:" data-no-answer="true">
	                                <input data-conv-question="Type in your e-mail" data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" type="email" name="email" required placeholder="What's your e-mail?">
	                                <input data-conv-question="Now tell me a secret (like a password)" type="password" data-minlength="6" id="senha" name="password" required placeholder="password">
									<select data-conv-question="Selects also support callback functions. For example, try one of these:">
											<option value="google" data-callback="google">Google</option>
											<option value="bing" data-callback="bing">Bing</option>
									</select>
	                                <select name="callbackTest" data-conv-question="You can do some cool things with callback functions. Want to rollback to the 'programmer' question before?">
	                                    <option value="yes" data-callback="rollback">Yes</option>
	                                    <option value="no" data-callback="restore">No</option>
	                                </select>
	                                <select data-conv-question="This is it! If you like me, consider donating! If you need support, contact me. When the form gets to the end, the plugin submits it normally, like you had filled it." id="">
	                                    <option value="">Awesome!</option>
	                                </select>
	                            </form>
	                        </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</section>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/autosize.min.js"></script>
	<script type="text/javascript" src="js/jquery.convform.min.js"></script>

	<script>
		function google() {
			window.open("https://google.com");
		}
		function bing() {
			window.open("https://bing.com");
		}
		var rollbackTo = false;
		var originalState = false;
		function storeState(stateWrapper) {
			rollbackTo = stateWrapper.current;
			console.log("storeState called: ",rollbackTo);
		}
		function rollback(stateWrapper) {
			console.log("rollback called: ", rollbackTo, originalState);
			console.log("answers at the time of user input: ", stateWrapper.answers);
			if(rollbackTo!=false) {
				if(originalState==false) {
					originalState = stateWrapper.current.next;
						console.log('stored original state');
				}
				stateWrapper.current.next = rollbackTo;
				console.log('changed current.next to rollbackTo');
			}
		}
		function restore(stateWrapper) {
			if(originalState != false) {
				stateWrapper.current.next = originalState;
				console.log('changed current.next to originalState');
			}
		}
	</script>
</body>
</html>

