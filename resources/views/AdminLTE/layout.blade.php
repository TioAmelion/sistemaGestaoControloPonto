<!DOCTYPE html>
<html>
<head>
@include("$tema/header")
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include("$tema/navbar")
  <!-- -->

   <!-- menu -->
   @include("$tema/menu")
  <!-- -->

   <!-- corpo -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
   <section class="content">
    @yield('conteudo')
   </section>
 </div>
  <!-- -->

   <!-- rodape -->
   @include("$tema/rodape")
  <!-- -->

  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
</body>
@include("$tema/js")
</html>