<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>ARSIP SURAT MASUK & SURAT KELUAR</title>
    <meta name="description" content="" />

    @include('layout.partial.link') 
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        <!-- Menu -->
        <!--  Navbar -->
        @include('layout.partial.header')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('content')
            </div>
            <!-- / Content -->

            @include('layout.partial.footer')
            <!-- Content wrapper -->
          </div>
      <!-- / Layout page -->
    </div>
    @include('layout.partial.script')
  </body>
</html>
