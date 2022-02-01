<!DOCTYPE html>
<html lang="en">
<head>
@include('user.css')
</head>
<body>
<!-- Back to top button -->
<div class="back-to-top"></div>
@include('user.header')

<div class="m-2">
  <table class="table table-bordered table-hover table-striped table-responsive-sm text-center">
    <thead class="bg-secondary text-light">
      <tr>
        <th>Doctor Name</th>
        <th>Date</th>
        <th>Message</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($appoint as $appoints)
      <tr>
        <td>{{$appoints->doctor}}</td>
        <td>{{$appoints->date}}</td>
        <td>{{$appoints->message}}</td>
        <td><span class="badge badge-info p-2">{{$appoints->status}}</span></td>
        <td><a href="{{url('cancel_appoint',$appoints->id)}}" onclick="return confirm('Are you sure to Cancel Appoinment')" class="btn btn-danger">Cancel</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('user.footer')
@include('user.script')
</body>
</html>