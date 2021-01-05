<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Employee details</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button {
	box-sizing: border-box;
	display: inline-block;
	min-width: 1.5em;
	padding: 1px;
	margin-left: 2px;
	text-align: center;
	text-decoration: none !important;
	cursor: pointer;
	color: #333 !important;
	border: 1px solid transparent;
	border-radius: 2px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  </nav>   

<div class="container">	
    <div class="row">		
        <div class="col-12">		
            <div class="col-md-12">
				<br>
				
				
                <h1>Ajax CRUD Operations in CodeIgniter <br>
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModal"><span class="fa fa-plus"></span> Add New</a></div><br>
                </h1>
            </div>            
            <table class="table table-striped" id="employeeListing">
                <thead>
                    <tr>
                        <th>Name</th>
						<th>Age</th>
                        <th>Skills</th>
						<th>Desgination</th>
						<th>Address</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="listRecords">                    
                </tbody>
            </table>
        </div>
    </div>
        
</div>	
<form id="saveEmpForm" method="post">
	<div class="modal fade" id="addEmpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">                       
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Name*</label>
					<div class="col-md-10">
					  <input type="text" name="name" id="name" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Age*</label>
					<div class="col-md-10">
					  <input type="text" name="age" id="age" class="form-control" required> 
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Skills*</label>
					<div class="col-md-10">
					  <input type="text" name="skills" id="skills" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Designation*</label>
					<div class="col-md-10">
					  <input type="text" name="designation" id="designation" class="form-control" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Address*</label>
					<div class="col-md-10">
					  <textarea name="address" id="address" class="form-control" rows="5" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Save</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<form id="editEmpForm" method="post">
	<div class="modal fade" id="editEmpModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Name*</label>
					<div class="col-md-10">
					  <input type="text" name="empName" id="empName" class="form-control" placeholder="Name" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Age*</label>
					<div class="col-md-10">
					  <input type="text" name="empAge" id="empAge" class="form-control" placeholder="Age" required>
					</div>
				</div>				
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Skills*</label>
					<div class="col-md-10">
					  <input type="text" name="empSkills" id="empSkills" class="form-control" placeholder="Skils" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Designation*</label>
					<div class="col-md-10">
					  <input type="text" name="empDesignation" id="empDesignation" class="form-control" placeholder="Skils" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Address*</label>
					<div class="col-md-10">
					   <textarea name="empAddress" id="empAddress" class="form-control" rows="5" required></textarea>
					</div>
				</div>
		  </div>
		  <div class="modal-footer">
			 <input type="hidden" name="empId" id="empId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Update</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<form id="deleteEmpForm" method="post">
	<div class="modal fade" id="deleteEmpModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			   <strong>Are you sure to delete this record?</strong>
		  </div>
		  <div class="modal-footer">
			<input type="hidden" name="deleteEmpId" id="deleteEmpId" class="form-control">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
			<button type="submit" class="btn btn-primary">Yes</button>
		  </div>
		</div>
	  </div>
	</div>
</form>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.2.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/crud_operation.js'?>"></script>
</body>
</html>