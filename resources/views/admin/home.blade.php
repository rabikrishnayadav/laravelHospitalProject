<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- plugins:css -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      
      <!-- partial:partials/_navbar.html -->
      @include('admin.navbar')
      
      <!-- partial -->
      @include('admin.body')

    </div>
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>