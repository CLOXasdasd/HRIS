<?php
    date_default_timezone_set('Asia/Manila');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Profile Sheet</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-sheet {
            max-width: 1500px;
            margin: 30px auto;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-sheet h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }

                table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container profile-sheet">
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <tbody>
                        <tr>
                            <th><h2 class="text-center">Applicant Profile Sheet</h2></th>
                            <th style="width: 35%"><center> <img src="dist/img/texwipe.png" width="50%"></center></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <h2 class="text-center">Applicant Profile Sheet</h2> -->
                <br>
  

        <div class="form-group row">
                        <div class="col-sm" hidden>
                <label for="firstName" class="col-sm col-form-label">Date <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="uniqueId" value="<?php echo date('dmY').rand(1,100);?>" readonly>
            </div>
            <div class="col-sm"hidden>
                <label for="firstName" class="col-sm col-form-label">Date <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="date" value="<?php echo date('F j, Y');?>" readonly>
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Expected Salary <span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="expectedsalary" placeholder="Expected Salary">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Position Type <span style="color:red;">*</span></label>
                <select  class="form-control" id="position" placeholder="Enter Position">
                  <option value="Operator">Operator</option>
                  <option value="Support">Support</option>
                </select>


            </div>


            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Position <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="pos_desc" placeholder="Position">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">First Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="firstName" placeholder="First Name">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Middle Name </label>
                <input type="text" class="form-control" id="MiddleName" placeholder="Middle Name">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Last Name <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="lastName" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Complete Current Address <span style="color:red;">*</span></label>
                <textarea class="form-control" id="completecurrentaddress" rows="2" cols="50" placeholder="Complete Current Address"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Complete Provincial Address <span style="color:red;">*</span></label>
                <textarea class="form-control" id="completeprobaddress" rows="2" cols="50" placeholder="Complete Provincial Address"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Telephone/Contact Number <span style="color:red;">*</span></label>
            <div class="col-sm-9">
               <input type="number" class="form-control" id="phone" placeholder="Telephone/Contact Number" oninput="checkLength1()">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Date of Birth <span style="color:red;">*</span></label>
                <input type="date" class="form-control" id="birthday" placeholder="First Name">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Age <span style="color:red;">*</span></label>
                <input type="number" class="form-control" id="age" placeholder="Age">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Place of Birth <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="placeofbirth" placeholder="Place of Birth">
            </div>
        </div>

       <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Civil Status <span style="color:red;">*</span></label>
                <select class="form-control" id="civilstatus">
                    <option value="Single ">Single </option>
                    <option value="Married ">Married </option>
                    <option value="Widowed ">Widowed </option>
                    <option value="Separated ">Separated </option>
                </select>
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Religion <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="religion" placeholder="Religion">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Nationality <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="nationality" placeholder="Nationality">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Language/Dialect Spoken <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="language" placeholder="Language/Dialect Spoken">
            </div>
        </div>
        <br>

        <h5>FAMILY BACKGROUND</h5>
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <thead>
                        <tr>
                            <th><center>RELATIONSHIP</center></th>
                            <th><center>NAME</center></th>
                            <th><center>DATE OF BIRTH</center></th>
                            <th><center>AGE</center></th>
                            <th><center>OCCUPATION/ COMPANY</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><center>Father</center>
                                <input type="text" class="form-control" id="familyInfo" placeholder="Enter Name" value="Father" hidden>
                            </td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Name"></td>
                            <td><input type="date" class="form-control" id="familyInfo" placeholder="Enter Date Of Birth"></td>
                            <td><input type="number" class="form-control" id="familyInfo" placeholder="Enter Age"></td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Occupation/Company"></td>
                        </tr>
                        <tr>
                            <td><center>Mother</center>
                                <input type="text" class="form-control" id="familyInfo" placeholder="Enter Name" value="Mother" hidden>
                            </td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Name"></td>
                            <td><input type="date" class="form-control" id="familyInfo" placeholder="Enter Date Of Birth"></td>
                            <td><input type="number" class="form-control" id="familyInfo" placeholder="Enter Age"></td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Occupation/Company"></td>
                        </tr>
                        <tr>
                            <td><center>Spouse (if married)</center>
                                <input type="text" class="form-control" id="familyInfo" placeholder="Enter Name" value="Spouse (if married)" hidden>
                            </td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Name"></td>
                            <td><input type="date" class="form-control" id="familyInfo" placeholder="Enter Date Of Birth"></td>
                            <td><input type="number" class="form-control" id="familyInfo" placeholder="Enter Age"></td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Occupation/Company"></td>
                        </tr>

                        <tr>
                            <td><center>LIVE-IN-PARTNER (if not married)</center>
                                <input type="text" class="form-control" id="familyInfo" placeholder="Enter Name" value="LIVE-IN-PARTNER (if not married)" hidden>
                            </td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Name"></td>
                            <td><input type="date" class="form-control" id="familyInfo" placeholder="Enter Date Of Birth"></td>
                            <td><input type="number" class="form-control" id="familyInfo" placeholder="Enter Age"></td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Occupation/Company"></td>
                        </tr>


                        <tr>
                            <td><center>Children</center>
                                <input type="text" class="form-control" id="familyInfo" placeholder="Enter Name" value="Children" hidden>
                            </td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Name"></td>
                            <td><input type="date" class="form-control" id="familyInfo" placeholder="Enter Date Of Birth"></td>
                            <td><input type="number" class="form-control" id="familyInfo" placeholder="Enter Age"></td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Occupation/Company"></td>
                        </tr>
                        <?php for($i = 1; $i<=4 ; $i++) { ?>
                        <tr>
                            <td><center><p hidden>Children</p></center>
                                <input type="text" class="form-control" id="familyInfo" placeholder="Enter Name" value="Children" hidden>
                            </td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Name"></td>
                            <td><input type="date" class="form-control" id="familyInfo" placeholder="Enter Date Of Birth"></td>
                            <td><input type="number" class="form-control" id="familyInfo" placeholder="Enter Age"></td>
                            <td><input type="text" class="form-control" id="familyInfo" placeholder="Enter Occupation/Company"></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <h5>EMPLOYMENT HISTORY (FROM PRESENT WORK TO PREVIOUS WORK)</h5>
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <thead>
                        <tr>
                            <th><center>COMPANY NAME</center></th>
                            <th><center>POSITION HELD</center></th>
                            <th style="width: 100px;"><center>FROM</center></th>
                            <th style="width: 100px;"><center>TO</center></th>
                            <th><center>LAST SALARY</center></th>
                            <th><center>REASON FOR LEAVING</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i<=5 ; $i++) { ?>
                        <tr>
                            <td><input type="text" class="form-control" id="employmentHist" placeholder="Enter Company Name"></td>
                            <td><input type="text" class="form-control" id="employmentHist" placeholder="Enter Position Held"></td>
                            <td><input type="text" class="form-control" id="employmentHist" placeholder="From"></td>
                            <td><input type="text" class="form-control" id="employmentHist" placeholder="To"></td>
                            <td><input type="text" class="form-control" id="employmentHist" placeholder="Enter Last Salary"></td>
                            <td><input type="text" class="form-control" id="employmentHist" placeholder="Enter Reason for Leaving"></td>
                        </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <h5>EDUCATIONAL BACKGROUND</h5>
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <thead>
                        <tr>
                            <th><center>LEVEL</center></th>
                            <th><center>SCHOOL ATTENDED</center></th>
                            <th style="width: 100px;"><center>FROM</center></th>
                            <th style="width: 100px;"><center>TO</center></th>
                            <th><center>COURSE / COMPLETED DEGREE / HONORS RECIEVED</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><center>ELEMENTARY</center>
                            <input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended" value="ELEMENTARY" hidden></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="From"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="To"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="COURSE / COMPLETED DEGREE / HONORS RECIEVED"></td>
                        </tr>
                        <tr>
                            <td><center>HIGH SCHOOL</center>
                            <input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended" value="HIGH SCHOOL" hidden></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="From"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="To"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="COURSE / COMPLETED DEGREE / HONORS RECIEVED"></td>
                        </tr>
                        <tr>
                            <td><center>VOCATIONAL</center>
                            <input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended" value="VOCATIONAL" hidden></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="From"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="To"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="COURSE / COMPLETED DEGREE / HONORS RECIEVED"></td>
                        </tr>
                        <tr>
                            <td><center>COLLEGE</center>
                            <input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended" value="COLLEGE" hidden></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="From"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="To"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="COURSE / COMPLETED DEGREE / HONORS RECIEVED"></td>
                        </tr>
                        <tr>
                            <td><center>OTHERS</center>
                            <input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended" value="OTHERS" hidden></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="Enter School Attended"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="From"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="To"></td>
                            <td><input type="text" class="form-control" id="schoolDetails" placeholder="COURSE / COMPLETED DEGREE / HONORS RECIEVED"></td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">Skills <span style="color:red;">*</span></label>
                <textarea class="form-control" id="skills" rows="2" cols="50" placeholder="Enter Skills"></textarea>
            </div>
        </div>
        <br>

        <h5>TRAININGS/SEMINARS ATTENDED </h5>
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <thead>
                        <tr>
                            <th><center>TITLE/TOPIC</center></th>
                            <th><center>SPONSORING COMPANY</center></th>
                            <th><center>PLACE</center></th>
                            <th><center>PERIOD</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i<=3 ; $i++) { ?>
                        <tr>
                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Topic"></td>
                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Sponsoring Company"></td>
                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Place"></td>
                            <td><input type="text" class="form-control" id="traininglist" placeholder="Enter Period"></td>
                        </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <h5>GOVERNMENT EXAMINATION TAKEN</h5>
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <thead>
                        <tr>
                            <th><center>NATURE OF EXAM</center></th>
                            <th><center>DATE TAKEN</center></th>
                            <th><center>RESULT/ RATING</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i<=3 ; $i++) { ?>
                        <tr>
                            <td><input type="text" class="form-control" id="governmentexamlist" placeholder="Enter NATURE OF EXAM"></td>
                            <td><input type="text" class="form-control" id="governmentexamlist" placeholder="Enter DATE TAKEN (e.g January 1, 202X)"></td>
                            <td><input type="text" class="form-control" id="governmentexamlist" placeholder="Enter RESULT/ RATING"></td>
                        </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <h5>CHARACTER REFERENCES (not related to you)</h5>
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <thead>
                        <tr>
                            <th><center>NAME</center></th>
                            <th><center>ADDRESS</center></th>
                            <th><center>TEL. OR CELLPHONE NO.</center></th>
                            <th><center>OCCUPATION</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i<=3 ; $i++) { ?>
                        <tr>
                            <td><input type="text" class="form-control" id="characterReference" placeholder="Enter Name"></td>
                            <td><input type="text" class="form-control" id="characterReference" placeholder="Enter ADDRESS"></td>
                            <td><input type="text" class="form-control" id="characterReference" placeholder="Enter TEL. OR CELLPHONE NO."></td>
                            <td><input type="text" class="form-control" id="characterReference" placeholder="Enter OCCUPATION"></td>
                        </tr>
                        <?php } ?>
                       
                    </tbody>
                </table>
            </div>
        </div>
        <br>

        <h5>PERSON KNOWN TO BE CONNECTED WITH TEXWIPE ASIA-ADVANCED MOLDING COMPANY, INC.</h5>
        <div class="form-group row">
            <div class="col-sm">
                <table>
                    <thead>
                        <tr>
                            <th><center>NAME</center></th>
                            <th><center>POSITION</center></th>
                            <th><center>RELATIONSHIP</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i<=3 ; $i++) { ?>
                        <tr>
                            <td><input type="text" class="form-control" id="contactperson" placeholder="Enter Name"></td>
                            <td><input type="text" class="form-control" id="contactperson" placeholder="Enter Position"></td>
                            <td><input type="text" class="form-control" id="contactperson" placeholder="Enter Relationship."></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">SSS No.<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="sss" placeholder="Enter SSS No.">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">TIN <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="tin" placeholder="Enter TIN">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">PHILHEALTH NO:<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="philhealth" placeholder="Enter SSS No.">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">PAG-IBIG NO: <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="pagibig" placeholder="Enter TIN">
            </div>
        </div>
        <br>

        <h5>PERSON TO CONTACT IN CASE OF EMERGENCY</h5>
        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">NAME:<span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="contactPersonRel" placeholder="Enter Relationship Name">
            </div>
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">RELATIONSHIP: <span style="color:red;">*</span></label>
                <input type="text" class="form-control" id="contactRelation" placeholder="Enter Relationship">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <label for="firstName" class="col-sm col-form-label">Contact Number:<span style="color:red;">*</span></label>
            </div>
            <div class="col-sm-6">
                <input type="number" class="form-control" id="contactContactnum" oninput="checkLength()" placeholder="Enter Contact Number (e.g 09XXXXXXX)">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm">
                <label for="firstName" class="col-sm col-form-label">ADDRESS: <span style="color:red;">*</span></label>
                <textarea class="form-control" id="contactaddress" rows="2" cols="50" placeholder="Complete Current Address"></textarea>
            </div>
        </div>

        <br>



        <br>

        <div class="form-group justify-content-center">
            <div class="container">
               
            </div>
                       
        </div>


        <div class="form-group row justify-content-center">
            <div class="col-sm-8 text-center">
                <p >NOTE: <span style="color:red">Anyone who will be proven with misrepresentation or falsification of information to secure employment in the company is subject for termination. </span></p>
                <textarea class="form-control" rows="5" cols="50" placeholder="Complete Current Address" disabled>I give my consent for Advanced Molding Company Inc. (AMCI) to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data, and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.</textarea><br>

                 <input type="checkbox" id="myCheckbox">
                <label for="myCheckbox">   I agree to the terms</label><br>
<br>

                  <button type="submit" class="btn btn-primary" id="btnSubmit" disabled>Submit</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">System Message </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                     <div class="form-group">
                        <label>Do you want to send it to Human Resource ?</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="dataSubmit">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">no</button>
                </div>
            
            </div>
        </div>
    </div>


    <!-- Bootstrap JS and dependencies -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/notify/notify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

  <script>
        const checkbox = document.getElementById('myCheckbox');
        const button = document.getElementById('btnSubmit');

        checkbox.addEventListener('change', function() {
            button.disabled = !checkbox.checked; // Enable or disable button based on checkbox state
        });
    </script>


<script type="text/javascript">

        document.addEventListener("input", (event) => {
      if (event.target.tagName === "INPUT" || event.target.tagName === "TEXTAREA") {
        // Remove all `/` characters from the input value
        event.target.value = event.target.value.replace(/\//g, "");
      }
    });

    function checkLength1() {
        const input = document.getElementById('phone');
        const message = document.getElementById('message');

        if (input.value.length >= 11) {
          input.value = input.value.substring(0, 11); // Disable the input field
        } else {
            input.disabled = false; // Ensure the input field is enabled if less than 11 characters
        }
    }




    function checkLength() {
        const input = document.getElementById('contactContactnum');
        const message = document.getElementById('message');

        if (input.value.length >= 11) {
          input.value = input.value.substring(0, 11); // Disable the input field
        } else {
            input.disabled = false; // Ensure the input field is enabled if less than 11 characters
        }
    }

    $(document).on('click','#btnSubmit',function(){   
        $("#editModal").modal("show");
    });


    $(document).on('click','#dataSubmit',function(){ 
        $("#dataSubmit").attr("disabled", true); 
        var pick = '50';





                var uniqueId =$.trim(encodeURI($("#uniqueId").val()));

        var date =$.trim(encodeURI($("#date").val()));
        var expectedsalary =$.trim(encodeURI($("#expectedsalary").val()));
        var position =$.trim(encodeURI($("#position").val()));
        var firstName =$.trim(encodeURI($("#firstName").val()));
        var MiddleName =$.trim(encodeURI($("#MiddleName").val()));
        var lastName =$.trim(encodeURI($("#lastName").val()));
        var completecurrentaddress =$.trim(encodeURI($("#completecurrentaddress").val()));
        var completeprobaddress =$.trim(encodeURI($("#completeprobaddress").val()));
        var phone =$.trim(encodeURI($("#phone").val()));
        var birthday =$.trim(encodeURI($("#birthday").val()));
        var age =$.trim(encodeURI($("#age").val()));
        var placeofbirth =$.trim(encodeURI($("#placeofbirth").val()));
        var civilstatus =$.trim(encodeURI($("#civilstatus").val()));
        var religion =$.trim(encodeURI($("#religion").val()));
        var nationality =$.trim(encodeURI($("#nationality").val()));
        var language =$.trim(encodeURI($("#language").val()));

        var pos_desc =$.trim(encodeURI($("#pos_desc").val()));



        let familyInfoText = document.querySelectorAll('input[id="familyInfo"]');
        let arrsfamilyInfo = [];
        familyInfoText.forEach((textbox) => {
            let modifiedValue = textbox.value.replace(/,/g, "||");
            arrsfamilyInfo.push(modifiedValue);
        });

        let employmentHistText = document.querySelectorAll('input[id="employmentHist"]');
        let arrsemploymentHist = [];
        employmentHistText.forEach((textbox) => {
            let modifiedValue = textbox.value.replace(/,/g, "||");
            arrsemploymentHist.push(modifiedValue );
        });

        let schoolDetailsText = document.querySelectorAll('input[id="schoolDetails"]');
        let arrsschoolDetails = [];
        schoolDetailsText.forEach((textbox) => {
             let modifiedValue = textbox.value.replace(/,/g, "||");
            arrsschoolDetails.push(modifiedValue);
        });

        var skills =$.trim(encodeURI($("#skills").val()));

        let traininglistText = document.querySelectorAll('input[id="traininglist"]');
        let arrstraininglist = [];
        traininglistText.forEach((textbox) => {
             let modifiedValue = textbox.value.replace(/,/g, "||");
            arrstraininglist.push(modifiedValue);
        });

        let governmentexamlistText = document.querySelectorAll('input[id="governmentexamlist"]');
        let arrgovernmentexamlist = [];
        governmentexamlistText.forEach((textbox) => {
             let modifiedValue = textbox.value.replace(/,/g, "||");
            arrgovernmentexamlist.push(modifiedValue);
        });

        let characterReferenceText = document.querySelectorAll('input[id="characterReference"]');
        let arrcharacterReference = [];
        characterReferenceText.forEach((textbox) => {
             let modifiedValue = textbox.value.replace(/,/g, "||");
            arrcharacterReference.push(modifiedValue);
        });

        let contactpersonText = document.querySelectorAll('input[id="contactperson"]');
        let arrcontactperson = [];
        contactpersonText.forEach((textbox) => {
             let modifiedValue = textbox.value.replace(/,/g, "||");
            arrcontactperson.push(modifiedValue);
        });

        var sss =$.trim(encodeURI($("#sss").val()));
        var tin =$.trim(encodeURI($("#tin").val()));
        var philhealth =$.trim(encodeURI($("#philhealth").val()));
        var pagibig =$.trim(encodeURI($("#pagibig").val()));                             
        
        var contactPersonRel =$.trim(encodeURI($("#contactPersonRel").val()));
        var contactRelation =$.trim(encodeURI($("#contactRelation").val()));
        var contactContactnum =$.trim(encodeURI($("#contactContactnum").val()));
        var contactaddress =$.trim(encodeURI($("#contactaddress").val()));

        var fd = new FormData(); 
        fd.append('pick',pick);

        fd.append('uniqueId',uniqueId);
        fd.append('date',date);
        fd.append('expectedsalary',expectedsalary);
        fd.append('position',position);
        fd.append('firstName',firstName);
        fd.append('MiddleName',MiddleName);
        fd.append('lastName',lastName);
        fd.append('completecurrentaddress',completecurrentaddress);
        fd.append('completeprobaddress',completeprobaddress);
        fd.append('phone',phone);
        fd.append('birthday',birthday);
        fd.append('age',age);
        fd.append('placeofbirth',placeofbirth);
        fd.append('civilstatus',civilstatus);
        fd.append('religion',religion);
        fd.append('nationality',nationality);
        fd.append('language',language);
        fd.append('arrsfamilyInfo',arrsfamilyInfo);
        fd.append('arrsemploymentHist',arrsemploymentHist);
        fd.append('arrsschoolDetails',arrsschoolDetails);
        fd.append('skills',skills);
        fd.append('arrstraininglist',arrstraininglist);
        fd.append('arrgovernmentexamlist',arrgovernmentexamlist);
        fd.append('arrcharacterReference',arrcharacterReference);
        fd.append('arrcontactperson',arrcontactperson);
        fd.append('sss',sss);
        fd.append('tin',tin);
        fd.append('philhealth',philhealth);
        fd.append('pagibig',pagibig);
        fd.append('contactPersonRel',contactPersonRel);
        fd.append('contactRelation',contactRelation);
        fd.append('contactContactnum',contactContactnum);
        fd.append('contactaddress',contactaddress);
        fd.append('pos_desc',pos_desc);
        

        if(expectedsalary == ""|| position == ""|| firstName == ""|| MiddleName == ""|| lastName == ""|| completecurrentaddress == ""){
            $("#dataSubmit").attr("disabled", false); 
            $.notify("Please Enter important field ", "error");
        } else {
           $.ajax({
                url: "pages/codes/admin_control.php",
                data: fd,
                processData: false,
                contentType: false,
                type:'POST',
                success:function(result){
                    if($.trim(result)!=0){
                        $.notify("Application sent to Human Resources","success");   
                         setTimeout(function() { 
                            window.location.href = "applicantExam?id=" + uniqueId + "&position=" + position;
                           }, 1000);
                    }else{
                        $.notify(" Credentials Not Recognize ","error");                           
                        $("#dataSubmit").attr("disabled", false); 
                      
                    }
                }
            });
         }
  $("#dataSubmit").attr("disabled", false); 
    });

    $(document).on('click','#dataMaybe',function(){ 
        alert("We will not submit");
    });
</script>