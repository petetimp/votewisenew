<!DOCTYPE html>
<html lang="en">
	<head>
                <meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="VoteWise">
                <meta name="author" content="Silent Monkeys">
                <link rel="icon" href="" type="image/x-icon" />
                {{ stylesheet_link('css/base.min.css') }}
                {{ stylesheet_link('css/votewise.css') }}
		{{ stylesheet_link('css/styles.css') }}
                {{ javascript_include('js/modernizr.js') }}
                {{ get_title() }}
	</head>
	<body>
		{{ content() }}
                {{ javascript_include('js/jquery/jquery.min.js') }}
                {{ javascript_include('js/bootstrap/bootstrap.min.js') }}
                {{ javascript_include('js/utils.js') }}
                {{ javascript_include('js/votewise.js') }}
	</body>
</html>
