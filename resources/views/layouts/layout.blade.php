<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" direction="{{ $lang_direction ?? 'rtl' }}" style="direction: {{ $lang_direction ?? 'rtl' }};">

<head>
    {{-- <script> console.log = function() {} </script> --}}
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: { "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"] },
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<link rel="shortcut icon" href="{!! asset( __('app.logos.favicon') ) !!}" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="{{ asset('vendors/css/vendor.bundle.base.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css.map') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    @stack('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="">
	<div class="grid my-5 mx-auto">
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel text-center">
                <div class="main-content">
                    @yield('cms-component')
                    <div class="sub-content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
	</div>

	@stack('before_scripts')
	@stack('scripts')
    <script>
           const lengthMenu = [[5,10, 25, 50, 200, 400, 1000, 2000, -1], [5,10, 25, 50, 200, 400, 1000, 'All']];
            const pagle      = 25;
            const language   = { url: "{!! __('base.url_data_table') !!}" };
            var options = {
                processing: true,
                serverSide: true,
                responsive: true,
                autoFill: true,
                fixedColumns: true,
                paging: true,
                info: true,
                lengthMenu: lengthMenu,
                pageLength: pagle,
                language: language,
                rowCallback: function(row, data) {
                    if( data["deleted_at"] ){
                        $(row).css('background-color', "rgb(201, 76, 76, 0.1)");
                    }
                },
            }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</body>
</html>
