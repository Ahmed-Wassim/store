<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    {{-- css styles --}}
    @include('dashboard.layouts.styles')
</head>

<body>
    <div class="container-scroller">
        {{-- nav bar  --}}
        @include('dashboard.layouts.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            {{-- side bar --}}
            @include('dashboard.layouts.sidebar')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    @include('dashboard.layouts.crumbs')
                    <div class="card-body">
                        @yield('content')
                    </div>
                    <!-- content-wrapper ends -->
                </div>
                @include('dashboard.layouts.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    {{-- scripts --}}
    @include('dashboard.layouts.scripts')
</body>

</html>
