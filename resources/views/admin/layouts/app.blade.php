<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin| Dashboard</title>

@include('admin.layouts.includes.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->

    @include('admin.layouts.includes.navbar')

    @include('admin.layouts.includes.sidebar')
    <div class="content-wrapper">
   @yield('content')
    </div>
  @include('admin.layouts.includes.footer')
  @include('admin.layouts.includes.foot')
</div>
</body>
</html>