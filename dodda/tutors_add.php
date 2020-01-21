<!DOCTYPE html>
<html>
<head>
    <title>ADavance Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="col-md-12">
                <div class="row 1">
                    <div class="col-md-12">
                        <div class="text-center">
                            <h1>Add Tutor</h1>
                        </div><hr>
                    </div>
                </div><!--end row 1-->
                <div class="row 2">
                    <div class="col-md-12">
                        <form>
                            <div class="row form-row-1">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="tutor_name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="tutor_phone" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="tutor_email" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input type="text" class="form-control" name="gender_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input type="text" class="form-control" name="tutor_dob" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control" name="tutor_age" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <input type="text" class="form-control" name="qualification_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Subjects</label>
                                        <input type="text" class="form-control" name="subject_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input type="text" class="form-control" name="experience_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>tutor_location</label>
                                        <input type="text" class="form-control" name="tutor_location" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>tutor_lat</label>
                                        <input type="text" class="form-control" name="tutor_lat" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>tutor_lng</label>
                                        <input type="text" class="form-control" name="tutor_lng" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Desired City</label>
                                        <input type="text" class="form-control" name="tutor_desired_city" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Job Type</label>
                                        <input type="text" class="form-control" name="job_type_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tutor Salary</label>
                                        <input type="text" class="form-control" name="tutor_salary" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Languages Known</label>
                                        <input type="text" class="form-control" name="languages_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Address Proof</label>
                                        <input type="text" class="form-control" name="address_proof_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control" name="tutor_designation" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Class Taken</label>
                                        <input type="text" class="form-control" name="classnames_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Boards Teach</label>
                                        <input type="text" class="form-control" name="boards_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SVJK Score</label>
                                        <input type="text" class="form-control" name="tutor_svjk_score" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Rating</label>
                                        <input type="text" class="form-control" name="tutor_rating" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Passport</label>
                                        <input type="text" class="form-control" name="passport_status" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Teaching Medium</label>
                                        <input type="text" class="form-control" name="teaching_medium_id" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <input type="text" class="form-control" name="tutor_specialization" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Teaching Certification</label>
                                        <input type="text" class="form-control" name="teaching_certification" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Institution Name</label>
                                        <input type="text" class="form-control" name="institution_name" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Criminal Cases/Complaints</label>
                                        <input type="text" class="form-control" name="criminal_cases_complaints" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Teaching Mode</label>
                                        <input type="text" class="form-control" name="teaching_mode_id" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="clearfix">
                                        <div class="float-right">
                                            <a href="#" class="btn btn-default">Cancel</a>
                                            <button class="btn btn-primary" name="">
                                                SAVE
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div><!--end form-row-1-->
                        </form>
                    </div> 
                </div><!--end row 2-->
            </div><!--end col-md-12-->
        </div><!--end container-->
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>