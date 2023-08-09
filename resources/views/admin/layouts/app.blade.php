<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INTERNAL COMPLAIN MANAGEMENT SYSTEM</title>

    {{-- Include styles --}}
    @include('admin.partials.styles')
    <link rel="shortcut icon" href="https://dev.twentyfirstgen.com/complaint-admin/public/storage/upload_image/logo-dummy.png" />
	<style>
	.mdi-delete {
		color:#ff0000;
	}
	.card .card-title {
		margin-bottom: 2.2rem !important;
		text-transform: capitalize;
		font-size: 2.125rem !important;
		font-weight: 600;
		text-align: center !important;
		color: #0179ff !important;  
	}
	.sidebar .nav .nav-item.active>.nav-link {
		background: rgba(1,84,181) !important;
	}
	.navbar .navbar-brand-wrapper .navbar-brand img {
		height: auto !important;
		width: 86px !important;
	}
	
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        @include('admin.partials.navbar') {{-- Include Navbar --}}
        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.sidebar') {{-- Include Sidebar --}}
            <div class="content-wrapper">
			@include('flash-message') 
                @yield('content') {{-- Include Page Content (content within class "main-panel") --}}
            </div>
        </div>
    </div>
    {{-- Include scripts --}}
    @include('admin.partials.scripts')
    @yield('scripts') {{-- Include Page Script (content within class "main-panel") --}}

<script>
function sortTable(table, order) {
	var asc   = order === 'asc',
		tbody = table.find('tbody');

	tbody.find('tr').sort(function(a, b) {
		if (asc) {
			return $('td:first', a).text().localeCompare($('td:first', b).text());
		} else {
			return $('td:first', b).text().localeCompare($('td:first', a).text());
		}
	}).appendTo(tbody);
}
</script>
</body>

</html>
