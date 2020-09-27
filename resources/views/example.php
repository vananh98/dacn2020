@extends('admin.layout.index')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
        <div class="alert alert-success">
        </div>     
      @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Level</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
            <tbody>
            <tr class="odd gradeX" align="center">
              <td></td>
              <td></td>
              <td></td>
              <td> </td>
              <td><</td>
              <td> </td>
            </tr>        
          </tbody>
        </table>
        <nav class="page-navigation">

        </nav>
      
    </div>
  </div>
</div>

</div>
@endsection